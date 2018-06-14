<?php
class TitlesController extends AppController
{

	var $name		= 'Titles';
	var $components	= array("TitleData", "LumpEdit");
	var $helpers	= array("TitlePage");

	function index()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Platform", "Platform", "Category", "Style", "Service", "Fee", "Spec", "Portal", "Package"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
		// debug($title);
		// exit;

		//おすすめ
		$recommends = $this->Title->recommends(Hash::extract($title["Category"], "{n}.id"), $title["Title"]["id"]);
//		pr($recommends);

		//投稿データ
//		$ratings = $this->Title->Vote->titleRatings($title["Title"]["id"]);
//		pr($ratings);
//		exit;

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("recommends", $recommends);
	}

	function rating()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Platform", "Platform", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//期間別評価
		$ratings = $this->Title->Vote->titleRatings($title["Title"]["id"], null, true);
		// $ratings["all"]		= $this->Title->Vote->titleRatings($title["Title"]["id"], null, true);
		// $ratings["year"]	= $this->Title->Vote->titleRatings($title["Title"]["id"], "-1year", true);
		// $ratings["days"]	= $this->Title->Vote->titleRatings($title["Title"]["id"], "-90days", true);
//		pr($ratings);
//		exit;

		//おすすめ
		$recommends = $this->Title->recommends(Hash::extract($title["Category"], "{n}.id"), $title["Title"]["id"]);
//		pr($recommends);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("ratings", $ratings);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("recommends", $recommends);
	}

	function review()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Platform", "Platform", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//レビュー
		$reviews = $this->Title->Vote->getNewer($title["Title"]["id"], true);
//		pr($reviews);
//		exit;

		//おすすめ
		$recommends = $this->Title->recommends(Hash::extract($title["Category"], "{n}.id"), $title["Title"]["id"]);
//		pr($recommends);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("reviews", $reviews);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("recommends", $recommends);
	}

	function single()
	{
		$this->_checkParams();
		if(empty($this->request->params["voteid"]))
		{
			return $this->redirect(array("controller" => "titles", "action" => "review", "path" => $this->request->params["path"], "ext" => "html"));
		}

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Platform", "Platform", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//投稿データ
		$vote = $this->Title->Vote->find("first", array(
			"recursive" => -1,
			"conditions" => array(
				"Vote.public" => 1,
				"Vote.id" => $this->request->params["voteid"],
				"Vote.title_id" => $title["Title"]["id"],
			),
		));
		$this->_emptyToNotFound($vote);
//		pr($vote);
//		exit;

		//前後
		$neighbors = $this->Title->Vote->find("neighbors", array(
			"recursive" => -1,
			"conditions" => array(
				"Vote.public" => 1,
				"Vote.title_id" => $title["Title"]["id"],
				"NOT" => array("Vote.review" => null),
			),
			"field" => "Vote.id",
			"value" => $vote["Vote"]["id"],
		));
//		pr($neighbors);
//		exit;

		//おすすめ
		$recommends = $this->Title->recommends(Hash::extract($title["Category"], "{n}.id"), $title["Title"]["id"]);
//		pr($recommends);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("vote", $vote);
		$this->set("neighbors", $neighbors);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("recommends", $recommends);
		//評価のみはnoindex
		if(empty($vote["Vote"]["review"]))
		{
			$this->set("metaTags", array("noindex"));
		}
	}

	function pc()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Platform", "Platform", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		/**
		 * PCデータ
		 */
		if(!empty($title["Titlesummary"]["pc_count"]))
		{
			$pcFields	= array("Pc.*", "Pcshop.*", "Pctype.*", "Pcgrade.*");
			$pcOrder	= "Pc.price";
			//pc type
			$pctypes = $this->Title->Pc->Pctype->find("all", array(
				"recursive" => -1,
				"order" => "Pctype.sort",
			));
//			pr($pctypes);
//			exit;
			//pc grade
			$pcgrades = $this->Title->Pc->Pcgrade->find("all", array(
				"recursive" => -1,
				"order" => "Pcgrade.sort",
			));
//			pr($pcgrades);
//			exit;

			//pickup
			$pcs["pickups"] = $this->Title->Pc->find("all", array(
				"conditions" => array(
					"Pc.public" => 1,
					"Pc.pickup" => 1,
					"Pc.title_id" => $title["Title"]["id"],
				),
				"fields" => $pcFields,
				"order" => $pcOrder,
			));
			//types & prices
			$lowPrice = null;
			$highPrice = null;
			foreach($pctypes as $pctype)
			{
				$typePcs = $this->Title->Pc->find("all", array(
					"conditions" => array(
						"Pc.public" => 1,
						"Pc.title_id" => $title["Title"]["id"],
						"Pc.pctype_id" => $pctype["Pctype"]["id"],
					),
					"fields" => $pcFields,
					"order" => $pcOrder,
				));
				//グレード
				foreach($typePcs as $typePc)
				{
					$pcs[$pctype["Pctype"]["path"]][$typePc["Pcgrade"]["path"]][] = $typePc;

					// low price
					$lowPrice	= ($lowPrice == null) ? $typePc["Pc"]["price"]
									: ($typePc["Pc"]["price"] <= $lowPrice) ? $typePc["Pc"]["price"] : $lowPrice;
					// hight price
					$highPrice	= ($highPrice == null) ? $typePc["Pc"]["price"]
									: ($typePc["Pc"]["price"] >= $highPrice) ? $typePc["Pc"]["price"] : $highPrice;
				}
			}
		}
		else
		{
			$pcs = null;
		}
//		pr($pcs);
//		exit;

		//おすすめ
		$recommends = $this->Title->recommends(Hash::extract($title["Category"], "{n}.id"), $title["Title"]["id"]);
//		pr($recommends);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("pcs", $pcs);
		if(!empty($pcs))
		{
			$this->set("pctypes", $pctypes);
			$this->set("pcgrades", $pcgrades);
		}
		$this->set(compact("lowPrice", "highPrice"));
		$this->set("recommends", $recommends);
	}

	function link()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Platform", "Platform", "Category", "Style", "Service", "Fee", "Fansite"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//サイトデータ振り分け
		$sites = array("Caps" => array(), "Fans" => array());
		foreach($title["Fansite"] as $key => $val)
		{
			switch($val["type"])
			{
				case 1 : //攻略
				array_push($sites["Caps"], $val);
					break;
				case 2 : //ファン
				array_push($sites["Fans"], $val);
					break;
			}
		}
		unset($title["Fansite"]);
//		pr($sites);
//		exit;

		//おすすめ
		$recommends = $this->Title->recommends(Hash::extract($title["Category"], "{n}.id"), $title["Title"]["id"]);
//		pr($recommends);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("sites", $sites);
		$this->set("recommends", $recommends);
	}


	/**
	 * SP
	 */
	function sp_index()
	{
		$this->index();
	}
	function sp_rating()
	{
		$this->rating();
	}
	function sp_review()
	{
		$this->review();
	}
	function sp_single()
	{
		$this->single();
	}
	function sp_pc()
	{
		$this->pc();
	}
	function sp_link()
	{
		$this->link();
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		//
		$conditions = array();
		$title_ids	= array();
		
		// //カテゴリ + プラットフォーム & ポータル

		//ID list
		$category_id	= $this->request->query("category");
		$style_id		= $this->request->query("style");
		$platform_id	= $this->request->query("platform");
		// debug(array($category_id, $style_id, $platform_id));
		// exit;
		$title_ids = $this->Title->getIdListsIntersect($category_id, $style_id, $platform_id);

		if(!empty($title_ids) && !!$this->request->query("portal"))
		{
			$title_ids = array_intersect($title_ids, $this->Title->idListByPortal($this->request->query["portal"]));
		}
		elseif(!!$this->request->query("portal"))	$title_ids = $this->Title->idListByPortal($this->request->query["portal"]);
		// debug($title_ids);
		// exit;

		//タイトルID
		if(!empty($title_ids)){ $conditions += array("Title.id" => $title_ids); }
		//
		//サービス
		if(!empty($this->request->query["service"]))
		{
			$conditions += array("Title.service_id" => $this->request->query["service"]);
		}
		//検索ワード
		if(!!$this->request->query("w"))
		{
			$conditions += array("OR" => $this->Title->wConditions($this->request->query("w")));
		}
		//
		// pr($conditions);
		// exit;

		$this->Title->unbindAll(array("Titlead", "Titlesummary", "Service", "Fee", "Fansite", "Vote", "Spec", "Pc", "Event", "Package", "Platform", "Category"));
		$this->Paginator->settings = array(
			"Title" => array(
				"conditions" => $conditions,
				"order" => "Title.id DESC",
				 "limit" => 100,
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
		// pr($conditions);
		// pr($titles);
		// exit;
		$this->set("titles", $titles);
		//
		$this->set("pankuz_for_layout", "タイトル一覧");
		$this->set("platforms", $this->Title->Platform->find("list", array("order" => "sort")));
		$this->set("categories", $this->Title->Category->find("list", array("order" => "sort")));
		$this->set("services", $this->Title->Service->find("list", array("order" => "sort")));
		$this->set("portals", $this->Title->Portal->find("list"));
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'title'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('title', $this->Title->read(null, $id));
//	}

	function sys_withads()
	{
		//タイトルデータ
		$this->Title->unbindAll(array("Titlead", "Service"));
		$this->Paginator->settings = array(
			"Title" => array(
				"conditions" => array(
					"Title.id" => $this->Title->Titlead->find("list", array(
						"fields" => array("Titlead.title_id"),
						"conditions" => array(
							"OR" => array(
								"Titlead.pc_text_src NOT" => null,
								"Titlead.pc_image_src NOT" => null,
								"Titlead.sp_text_src NOT" => null,
								"Titlead.sp_image_src NOT" => null,
								"Titlead.ios_text_src NOT" => null,
								"Titlead.ios_image_src NOT" => null,
								"Titlead.android_text_src NOT" => null,
								"Titlead.android_image_src NOT" => null,
							)
						)
					))
				),
				"order" => "Title.id DESC",
				 "limit" => 100,
				"paramType" => "querystring",
			)
		);
		$titles = $this->Paginator->paginate("Title");
		// pr($titles);
		// exit;
		$this->set("titles", $titles);
		$this->set("services", $this->Title->Service->find("list", array("order" => "sort")));
		//
		$this->set("pankuz_for_layout", "広告付きタイトル一覧");
	}

	function sys_add()
	{
		// pr($this->request);
		// exit;
		if(!empty($this->request->data))
		{
			//File upload
			$this->_sysThumbUpload($this->request->data);
			//
			$this->Title->create();
			if($this->Title->saveAssociated($this->request->data))
			{
				$this->request->data["Titlesummary"]["id"]		= $this->Title->id;
				$this->request->data["Titlesummary"]["title_id"] = $this->Title->id;
//				pr($this->Title);
				$this->Title->Titlesummary->create();
				if($this->Title->Titlesummary->save($this->request->data))
				{
					$this->Session->setFlash(Configure::read("Success.create"));
					return $this->redirect('/sys');
				}
				else
				{
					$this->Session->setFlash(Configure::read("Error.summary"));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		//
		$this->_sysSetTitleAssociations();
		//
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "タイトル一覧", "url" => array("action" => "index")),
			"新規登録",
		));
	}

	function sys_edit($id = null)
	{
		if(!$id && empty($this->request->data))
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if(!empty($this->request->data))
		{
			//File upload
			$this->_sysThumbUpload($this->request->data);
			//
			if($this->Title->saveAssociated($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect('/sys');
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if(empty($this->request->data))
		{
			$this->request->data = $this->Title->read(null, $id);
			
			if(empty($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Error.id"));
				return $this->redirect(array('action' => 'index'));
			}
		}
		//
		$this->_sysSetTitleAssociations();
		//
		$this->set("pankuz_for_layout", array(
			array("str" => "タイトル一覧", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Title"], $this->Title))
			{
//				pr($this->request->data["Title"]);
//				exit;
				if($this->Title->saveAll($this->request->data["Title"]))
				{
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdateAll()){}
					else{ $this->Session->setFlash(Configure::read("Error.summary")); }
				}
				else
				{
					$this->Session->setFlash(Configure::read("Error.lump"));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		return $this->redirect($this->referer('/sys'));
	}

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer('/sys'));
		}
		if($this->Title->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer('/sys'));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer('/sys'));
	}

	function sys_update($id = null)
	{
		if(!empty($id))
		{
			$this->Session->setFlash(Configure::read(($this->Title->summaryUpdateTitle($id)) ? "Success.summary_update" : "Error.summary_update" ));
		}
		else
		{
			$this->Session->setFlash(Configure::read("Error.id"));
		}
		//
		// $this->set("pankuz_for_layout", array(
		// 	array("str" => "タイトル一覧", "url" => array("action" => "index")),
		// 	"タイトル集計更新",
		// ));
		$this->redirect('/sys');
	}

	function sys_updateall()
	{
		$this->Session->setFlash(Configure::read(($this->Title->summaryUpdateAll()) ? "Success.summary_update_all" : "Error.summary_update_all" ));
		//
		// $this->set("pankuz_for_layout", array(
		// 	array("str" => "タイトル一覧", "url" => array("action" => "index")),
		// 	"全タイトル集計更新",
		// ));
		$this->redirect('/sys');
	}


/** Private methods
------------------------------ **/

/**
 * タイトルデータ取得
 *
 * @return	array
 * @access	private
 */
	function _getTitleData()
	{
		return $this->Title->find("first", array(
			"conditions" => array(
				"Title.url_str" => $this->request->params["path"],
			)
		));
	}

/**
 * タイトルデータ取得後のデータ有無チェック＆投稿可否
 *
 * @param	array	$title Title data
 * @return	void
 * @access	private
 */
	function _afterGetTitleData(&$title)
	{
		//リダイレクト
		$this->_emptyToNotFound($title["Title"]["public"]);
		//Check votable
		$title["Title"]["votable"] = $this->TitleData->votable($title["Title"]["service_id"], $title["Title"]["test_start"]);
		// $title["Title"]["is_votable"] = ();
	}

/**
 * サムネイルアップロード
 * 
 * @param	array	request data
 * @return	void
 * @access	private
 */
	function _sysThumbUpload(&$data)
	{
		if(!empty($data["Title"]["thumb_image"]["name"]))
		{
			//アップロードするファイルの場所
			$uploadprefix	= "thumb_";
			$uploaddir		= WWW_ROOT . "img" . DS . "thumb";
			$uploadfile		= $uploaddir . DS . basename($data["Title"]["thumb_image"]["name"]);

			$pathinfo		= pathinfo($uploadfile);
			$filename		= $uploadprefix . $data["Title"]["url_str"] . "." . $pathinfo["extension"];
			$uploadfile		= $pathinfo['dirname'] . DS . $filename;
			$data["Title"]["thumb_image"]["name"] = $filename;
			//画像をテンポラリーの場所から、上記で設定したアップロードファイルの置き場所へ移動
			if(move_uploaded_file($data["Title"]["thumb_image"]["tmp_name"], $uploadfile))
			{
				//成功
			}
			else
			{
				//失敗したら、errorを表示
				$this->Session->setFlash(Configure::read("Error.upload"));
			}
			$data["Title"]["thumb_name"]	= $filename;
		}
		$data["Title"]["thumb_image"]	= null;
	}

/**
 * タイトル関連モデルセット
 * 
 * @return	void
 * @access	private
 */
	function _sysSetTitleAssociations()
	{
		$services	= $this->Title->Service->find('list', array('conditions' => array('public' => true), 'order' => 'sort'));
		$fees		= $this->Title->Fee->find('list', array('conditions' => array('public' => true), 'order' => 'sort'));
		$platforms	= $this->Title->Platform->find('list', array('conditions' => array('public' => true), 'order' => 'sort'));
		$categories	= $this->Title->Category->find('list', array('conditions' => array('public' => true), 'order' => 'sort'));
		$styles		= $this->Title->Style->find('list', array('conditions' => array('public' => true), 'order' => 'sort'));
		$portals	= $this->Title->Portal->find('list', array('conditions' => array('public' => true)));
		//
		$this->set(compact('services', 'fees', 'platforms', 'categories', 'styles', 'portals'));
	}
}
?>