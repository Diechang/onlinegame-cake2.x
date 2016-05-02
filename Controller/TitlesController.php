<?php
class TitlesController extends AppController
{

	var $name		= 'Titles';
	var $components	= array("TitleData", "LumpEdit");
	var $helpers	= array("TitlePage", "VotePage");

	function index()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee", "Spec", "Portal", "Package"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		//投稿データ
//		$ratings = $this->Title->Vote->titleRatings($title["Title"]["id"]);
//		pr($ratings);
//		exit;

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("relations", $relations);
	}

	function rating()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//期間別評価
		$ratings["all"]		= $this->Title->Vote->titleRatings($title["Title"]["id"], null, true);
		$ratings["year"]	= $this->Title->Vote->titleRatings($title["Title"]["id"], "-1year", true);
		$ratings["days"]	= $this->Title->Vote->titleRatings($title["Title"]["id"], "-90days", true);
//		pr($ratings);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("ratings", $ratings);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("relations", $relations);
	}

	function review()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//レビュー
		$reviews = $this->Title->Vote->getNewer($title["Title"]["id"], true);
//		pr($reviews);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("reviews", $reviews);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("relations", $relations);
	}

	function allvotes()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//レビュー
		$votes = $this->Title->Vote->getNewer($title["Title"]["id"]);
//		pr($votes);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("votes", $votes);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("relations", $relations);
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
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
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
		$this->_emptyToHome($vote);
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
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("vote", $vote);
		$this->set("neighbors", $neighbors);
		$this->set("voteItems", $this->Title->Vote->voteItems);
		$this->set("relations", $relations);
		//評価のみはnoindex
		if(empty($vote["Vote"]["review"]))
		{
			$this->set("metaTags", array("noindex"));
		}
	}

	function _events()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);

		/**
		 * イベントデータ
		 */
		if(!empty($title["Titlesummary"]["event_count"]))
		{
			$now = date("Y-m-d H:i:s");
			//開催中
			$events["current"] = $this->Title->Event->find("all", array(
				"recursive" => -1,
				"conditions" => array(
					"Event.title_id" => $title["Title"]["id"],
					"Event.public" => 1,
					"Event.start <=" => $now,
					"Event.end >=" => $now,
				),
				"order" => "Event.start DESC"
			));
			//開催予定
			$events["future"] = $this->Title->Event->find("all", array(
				"recursive" => -1,
				"conditions" => array(
					"Event.title_id" => $title["Title"]["id"],
					"Event.public" => 1,
					"Event.start >=" => $now,
				),
				"order" => "Event.start DESC"
			));
			//開催済み
			$events["back"] = $this->Title->Event->find("all", array(
				"recursive" => -1,
				"conditions" => array(
					"Event.title_id" => $title["Title"]["id"],
					"Event.public" => 1,
					"Event.end <=" => $now,
				),
				"order" => "Event.start DESC"
			));
		}
		else
		{
			$events = null;
		}
//		pr($events);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("events", $events);
		$this->set("relations", $relations);
	}

	function _event()
	{
		$this->_checkParams();
		if(empty($this->request->params["eventid"]))
		{
			return $this->redirect(array("controller" => "titles", "action" => "events", "path" => $this->request->params["path"], "ext" => "html"));
		}

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//イベントデータ
		$event = $this->Title->Event->find("first", array(
			"recursive" => -1,
			"conditions" => array(
				"Event.public" => 1,
				"Event.id" => $this->request->params["eventid"],
				"Event.title_id" => $title["Title"]["id"],
			),
		));
//		pr($event);
//		exit;
		$this->_emptyToHome($event);

		//一覧
		$events = $this->Title->Event->find("all", array(
			"recursive" => -1,
			"conditions" => array(
				"Event.public" => 1,
				"Event.title_id" => $title["Title"]["id"],
			),
			"order" => "Event.start DESC",
		));
//		pr($events);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("event", $event);
		$this->set("events", $events);
		$this->set("relations", $relations);
	}

	function pc()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
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
			//types
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
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("pcs", $pcs);
		$this->set("pctypes", $pctypes);
		$this->set("pcgrades", $pcgrades);
		$this->set("relations", $relations);
	}

	function link()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee", "Fansite"));
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
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("sites", $sites);
		$this->set("relations", $relations);
	}

	function search()
	{
		$this->_checkParams();

		/**
		 * データ取得
		 */
		//タイトルデータ
		$this->Title->unbindAll(array("Titlesummary", "Category", "Style", "Service", "Fee"));
		$title = $this->_getTitleData();
		$this->_afterGetTitleData($title);
//		pr($title);
//		exit;

		//おすすめ
		$relations = $this->Title->relations(Set::extract('Cateogry/id', $title["Category"]), $title["Title"]["id"]);
//		pr($relations);

		/**
		 * セット
		 */
		$this->set("title", $title);
		$this->set("relations", $relations);
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		//
		$conditions = array();
		$title_ids	= array();

		// if(!empty($this->request->query["w"]) && !empty($this->request->query["category"]) && !empty($this->request->query["service"])){}
		
		//カテゴリ
		// pr($this->request->query["category"]);
		if(!empty($this->request->query["category"]))
		{
			$title_ids = $this->Title->idListByCategory($this->request->query["category"]);
		}
		// pr($title_ids);
		// exit;
		//スタイル

		//タイトルID
		if(!empty($title_ids)){ $conditions += array("Title.id" => $title_ids); }
		//
		//サービス
		if(!empty($this->request->query["service"]))
		{
			$conditions += array("Title.service_id" => $this->request->query["service"]);
		}
		//検索ワード
		$w			= (isset($this->request->query["w"])) ? urldecode($this->request->query["w"]) : null;
		if(!empty($w))
		{
//			$w			= trim(str_replace("　", " ", $w));
//			$w			= explode(" ", $w);
//			$wConditions	= array();
//			foreach($w as $val)
//			{
//				$wConditions = array_merge($wConditions, array(
//						"Title.title_official LIKE '%" . $val . "%'",
//						"Title.title_read LIKE '%" . $val . "%'",
//						"Title.title_sub LIKE '%" . $val . "%'",
//						"Title.title_abbr LIKE '%" . $val . "%'",
//						"Title.url_str LIKE '%" . $val . "%'",
//						"Title.description LIKE '%" . $val . "%'",
//				));
//			}
			//
			$conditions += array("OR" => $this->Title->wConditions($w));
		}
		//
		// pr($conditions);
		// exit;

		$this->Title->unbindAll(array("Titlesummary", "Service", "Fee", "Fansite", "Vote", "Spec", "Pc", "Event", "Package", "Category"));
		//fields
		$this->Title->belongsTo["Service"]["fields"] = array("id", "str");
		$this->Title->belongsTo["Fee"]["fields"] = array("id", "path");

		$this->Title->hasMany["Fansite"]["fields"] = array("id");
		$this->Title->hasMany["Vote"]["fields"] = array("id");
		$this->Title->hasMany["Spec"]["fields"] = array("id");
		$this->Title->hasMany["Pc"]["fields"] = array("id");
		$this->Title->hasMany["Event"]["fields"] = array("id");
		$this->Title->hasMany["Package"]["fields"] = array("id");

		$this->Title->hasAndBelongsToMany["Category"]["fields"] = array("id", "path");
		// $this->Title->hasAndBelongsToMany["Style"]["fields"] = array("id", "path");
		// $this->Title->hasAndBelongsToMany["Portal"]["fields"] = array("id", "url_str");
		//
		// pr($this->Title);
		$titles = $this->Title->find("all", array(
			"conditions" => $conditions,
			"order" => "Title.id DESC",
		));
		// pr($conditions);
		// pr($titles);
		// exit;
		$this->set("titles", $titles);
		//
		$this->set("pankuz_for_layout", "タイトル一覧");
		$this->set("categories", $this->Title->Category->find("list"));
		$this->set("services", $this->Title->Service->find("list"));
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
			if($this->Title->save($this->request->data))
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
			if($this->Title->save($this->request->data))
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
		$this->_emptyToHome($title["Title"]["public"]);
		//Check votable
		$title["Title"]["votable"] = $this->TitleData->votable($title["Title"]["service_id"], $title["Title"]["test_start"]);
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
		$services	= $this->Title->Service->find('list');
		$fees		= $this->Title->Fee->find('list');
		$categories	= $this->Title->Category->find('list');
		$styles		= $this->Title->Style->find('list');
		$portals	= $this->Title->Portal->find('list');
		//
		$this->set(compact('services', 'fees', 'categories', 'styles', 'portals'));
	}
}
?>