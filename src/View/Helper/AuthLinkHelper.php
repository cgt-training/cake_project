<?php

namespace App\View\Helper;

use Cake\View\Helper;



class AuthLinkHelper extends Helper{


	public function allowedLink($userRole=null,$url=null,$actionName=null){

	// $this->AuthLink->allowedLink($userRole,['action' => 'view', $user->id],' View ');

		if($actionName == null){
			$actionName = $url['action'];
		}

			
		if($userRole == null || empty($url) || $userRole == 'user')
		{
			switch($url['action']){
				case 'delete' : $actionName = "-";
								$url['url']='';
								break;

				case 'edit'    : $actionName = "-";
								$url['url']='';
								break;
				}

				
		}

		else if(!empty($user) && !empty($url)){
			
			if($user == '')
			{
				switch($action['action']){
					case 'delete' : $url['action'] = "-";
						    		$url['url']='';
				}
			
			}
			
		}
		

		if($actionName == 'delete' || $actionName == 'Delete'){

			return $this->Html->link($actionName, $url,)
		}

		$url['url'] = $url;
		$url['action'] = $actionName;
		$this->Html->link(__($action['action']), $action['url']) ;

		return $url;
	}

}		