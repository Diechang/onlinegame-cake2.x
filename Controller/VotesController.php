<?php
class VotesController extends AppController
{

	var $name = 'Votes';
	var $components = array("Common", "TitleData", "VoteData", "LumpEdit", "Facebook");

	var $paginate = array(
		"Vote" => array(
			"limit" => 100,
			"order" => "Vote.created DESC",
			"conditions" => array(),
			"fields" => array(
				"Vote.*",
				"Title.id",
				"Title.title_official",
			),
			"paramType" => "querystring",
		),
	);

	function add()
	{
		if(!empty($this->request->data))
		{
			//Title ID
			$titleId = $this->request->data["Vote"]["title_id"];
			//認証番号チェック
			if($this->Common->spamCheck($this->request->data["Vote"]["spam_num"]))
			{
				//cookey
				if($this->cookey)
				{//Delete and New
					$this->Cookie->delete("cookey");
				}
				else
				{//New cookie
					$this->cookey = uniqid();
				}
				$this->Cookie->write("cookey", $this->cookey, false, "90 Days");

				//ホスト
				$this->ip		= getenv("REMOTE_ADDR");
				$this->host		= getenv("REMOTE_HOST");
				if($this->host == null || $this->host == $this->ip)
				{
					$this->host	= gethostbyaddr($this->ip);
				}
				//

				$this->request->data["Vote"]["ip"]	= $this->ip;
				$this->request->data["Vote"]["host"]	= $this->host;
				//Cookie
				$this->request->data["Vote"]["cookey"] = $this->cookey;

				/**
				 * 重複チェック
				 */
				//IP&COOKIE check
				$checkCount = $this->Vote->find("count", array(
					"conditions" => array(
						"Vote.title_id" => $titleId,
						"OR" => array(
							"Vote.ip" => $this->ip,
							"Vote.host" => $this->host,
							"Vote.cookey" => $this->cookey,
						)
					)
				));
				//
				if($checkCount > 0)
				{
					$this->Session->setFlash("同一タイトルへの投稿はできません", "flash_default");
				}
				else
				{
					//Save
					$this->Vote->create();
					if($this->Vote->save($this->request->data))
					{
						$this->_share($this->Vote->id);
						$this->Session->setFlash("投稿ありがとうございました！", "flash_default", array("type" => "success"));
						return $this->redirect(array("controller" => "votes", "action" => "fin", $this->Vote->id));
					}
					else
					{
						$this->Session->setFlash("登録できませんでした。", "flash_default", array("body" => "入力内容を確認してください。"));
					}
				}
			}
			else
			{
				$this->Session->setFlash("認証番号が不正です", "flash_default");
			}
			/**
			 * Title data
			 */
			$title = $this->Title->find("first", array(
				"conditions" => array(
					"Title.id" => $titleId,
				),
				"fields" => array(
					"Title.id",
					"Title.title_official",
					"Title.title_read",
					"Title.url_str",
					"Title.service_id",
					"Title.test_start",
				),
			));
			//Check votable
			$title["Title"]["votable"] = $this->TitleData->votable($title["Title"]["service_id"], $title["Title"]["test_start"]);
			//
			//Set
			$this->set("title", $title);
			$this->set("voteItems", $this->Vote->voteItems);
		}
		else
		{
			return $this->redirect("/");
		}
	}

	function edit($id = null)
	{
		$this->_emptyToHome($id);

		//Get
		$dataVote = $this->Vote->find("first", array(
			"conditions" => array(
				"Vote.public" => 1,
				"Vote.id" => $id,
				"Title.public" => 1,
				"NOT" => array("Vote.pass" => null)
			),
			"fields" => array(
				"Vote.*",
				"Title.id",
				"Title.title_official",
				"Title.title_read",
				"Title.url_str",
				"Title.service_id",
				"Title.test_start",
			)
		));
//		pr($dataVote);
		//
		$this->_emptyToHome($dataVote); //投稿チェック
		$this->_emptyToHome($dataVote["Vote"]["pass"]);
		//Check votable
		$dataVote["Title"]["votable"] = true;

		if(!empty($this->request->data)) //データチェック
		{
			if($this->request->data["Vote"]["pass"] == $dataVote["Vote"]["pass"]) //パスワードチェック
			{
				if($this->Common->spamCheck($this->request->data["Vote"]["spam_num"])) //スパムチェック
				{
					$this->Vote->id = $id;
					//
					//Save
					if($this->Vote->save($this->request->data))
					{
						$this->Session->setFlash("レビュー・評価の編集が完了しました", "flash_default", array("type" => "success"));
						return $this->redirect(array("controller" => "votes", "action" => "fin", $id));
					}
					else
					{
						$this->Session->setFlash("登録できませんでした。", "flash_default", array("body" => "入力内容を確認してください。"));
					}
				}
				else
				{
					$this->Session->setFlash("認証番号が不正です", "flash_default");
				}
			}
			else
			{
				$this->Session->setFlash("パスワードが違います", "flash_default");
			}
			$this->request->data["Vote"]["id"] = $dataVote["Vote"]["id"];
			$this->request->data["Title"] = $dataVote["Title"];
		}
		else
		{
			$this->request->data = $dataVote;
		}
//		pr($this->request->data);
		$this->set("voteItems", $this->Title->Vote->voteItems);
	}

	function fin($id = null)
	{
		if(!empty($id))
		{
			$vote = $this->Vote->find("first", array(
				"conditions" => array(
					"Vote.id" => $id,
				),
			));
//			pr($vote);
			$noneTitles = $this->Title->find("all", array(
				"conditions" => array(
					"Title.id" => $this->Title->Titlesummary->find("list", array("conditions" => array("vote_count_vote" => 0))),
					"Title.public" => 1,
//					"Titlesummary.vote_count_vote <" => 1,
					"Title.service_id" => 2, //正式のみ
				),
				"fields" => array(
					"Title.id",
					"Title.title_official",
					"Title.title_read",
					"Title.url_str",
				),
				"order" => array("Title.title_official"),
			));
//			pr($noneTitles);
			//
			//Set
			$this->set("vote", $vote);
			$this->set("noneTitles", $noneTitles);
		}
		else
		{
			return $this->redirect("/");
		}
	}

	/**
	 * Private
	 */
	function _share($voteId)
	{
		if(!empty($voteId))
		{
			$voteData = $this->Vote->findById($voteId);
//			pr($voteData);

			if(!empty($voteData["Vote"]["review"]))
			{
				//HTML helper
				App::uses('HtmlHelper', 'View/Helper');
				$html = new HtmlHelper(new View());

				$shareData = array(
					"link" => Configure::read("Site.root") . $html->url(array("controller" => "titles", "action" => "single", "path" => $voteData["Title"]["url_str"], "voteid" => $voteId, "ext" => "html")),
					"message" => $this->TitleData->titleTag($voteData["Title"]["title_official"], $voteData["Title"]["title_read"], $voteData["Title"]["title_abbr"], $voteData["Title"]["title_sub"])
								. "への新着レビュー【" . $this->VoteData->pointFormat($voteData["Vote"]["single_avg"]) . "点】",
				);
//				pr($shareData);

				//Facebook
				$this->Facebook->init();
				$this->Facebook->post($shareData, true);
			}
		}
	}


	/**
	 * Sys
	 */
	function sys_index()
	{
		$title_id	= !empty($this->request->query["title_id"])	? $this->request->query["title_id"] : null;
		$w			= !empty($this->request->query["w"])		? $this->request->query["w"] : null;

		$this->set(compact("title_id", "w"));
		//
		//Vote data
		$this->Vote->recursive = 2;
		$this->Vote->Title->unbindAll(array("Titlesummary"));
		if(isset($w))
		{
			$this->paginate["Vote"]["conditions"]["OR"] = array(
				"Vote.poster_name LIKE '%" . $w . "%'",
				"Vote.title LIKE '%" . $w . "%'",
				"Vote.review LIKE '%" . $w . "%'",
				"Vote.ip LIKE '%" . $w . "%'",
				"Vote.host LIKE '%" . $w . "%'",
				"Vote.cookey LIKE '%" . $w . "%'",
			);
		}
		if(isset($title_id))
		{
			$this->paginate["Vote"]["conditions"]["title_id"] = $title_id;
		}
		$this->Paginator->settings = $this->paginate;
		//
		$this->set("votes", $this->paginate("Vote"));
		//
		//Title data
		$titlesCount = $this->Vote->Title->titleListWithSummaryCount("vote_count_vote", "Vote");
		//
		$this->set("titlesCount", $titlesCount);
		//
		//
		if(!empty($title_id))
		{
			$this->set("pankuz_for_layout", array(
				array("str" => "投稿一覧", "url" => array("action" => "index")),
				$this->Vote->Title->field("title_official", array("Title.id" => $title_id)),
			));
			// $this->set("title_id", $title_id);
		}
		else
		{
			$this->set("pankuz_for_layout", "投稿一覧");
			// $this->set("title_id", 0);
		}
	}

//	function sys_view($id = null)
//	{
//		if(!$id)
//	{
//			$this->Session->setFlash(sprintf(__('Invalid %s'), 'vote'));
//			return $this->redirect(array('action' => 'index'));
//		}
//		$this->set('vote', $this->Vote->read(null, $id));
//	}

//	function sys_add()
//	{
//		if(!empty($this->request->data))
//	{
//			$this->Vote->create();
//			if($this->Vote->save($this->request->data))
//	{
//				$this->Session->setFlash(sprintf(__('The %s has been saved'), 'vote'));
//				return $this->redirect(array('action' => 'index'));
//			}
//		else
//	{
//				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.'), 'vote'));
//			}
//		}
//		$titles = $this->Vote->Title->find('list');
//		$this->set(compact('titles'));
//	}

	function sys_edit($id = null)
	{
		if(!$id && empty($this->request->data))
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect(array('action' => 'index'));
		}
		if(!empty($this->request->data))
		{
			if($this->Vote->save($this->request->data))
			{
				$this->Session->setFlash(Configure::read("Success.modify"));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.create"));
			}
		}
		if(empty($this->request->data))
		{
			$this->request->data = $this->Vote->read(null, $id);
		}
		//
		$this->set("voteItems", $this->Vote->voteItems);
		$this->set("pankuz_for_layout", array(
			array("str" => "投稿一覧", "url" => array("action" => "index")),
			"編集",
		));
	}

	function sys_lump()
	{
		if(!empty($this->request->data))
		{
			//変更チェック
			if($this->LumpEdit->changeCheck($this->request->data["Vote"], $this->Vote))
			{
//				pr($this->request->data["Vote"]);
//				exit;
				if($this->Vote->saveAll($this->request->data["Vote"]))
				{
					$this->Session->setFlash(Configure::read("Success.lump"));
					if($this->Title->summaryUpdateVotes()){}
					else{ $this->Session->setFlash(Configure::read("Error.summary")); }
				}
				else
				{
					$this->Session->setFlash(Configure::read("Error.lump"));
					return $this->redirect($this->referer(array('action' => 'index')));
				}
			}
			else
			{
				$this->Session->setFlash(Configure::read("Error.lump_empty"));
			}
		}
		return $this->redirect($this->referer(array('action' => 'index')));
	}

	function sys_delete($id = null)
	{
		if(!$id)
		{
			$this->Session->setFlash(Configure::read("Error.id"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		if($this->Vote->delete($id))
		{
			$this->Session->setFlash(Configure::read("Success.delete"));
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(Configure::read("Error.delete"));
		return $this->redirect($this->referer(array('action' => 'index')));
	}
}
?>