<?php echo $this->element("common_officiallink", array("link" => ($title["Title"]["service_id"] != 1) 
		? $this->Common->titleJumpLink($titleWithStrs["Span"], $title["Title"], $title["Titlead"], "pc", array("escape" => false))
		: '<span class="ended">サービス終了・休止中</span>'))?>