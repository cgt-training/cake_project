<?php

namespace App\View\Helper;

use Cake\View\Helper;


class AuthLinkHelper extends Helper{

	public $helpers = ['Html','Form'];

	public function allowedLink($userRole = null, $url = [], $actionName = null, $options = []){

	// $this->AuthLink->allowedLink($userRole,['action' => 'view', $user->id],' View ');

		if($actionName == null){
			$actionName = $url['action'];
			
		}

			
		if($userRole == null || empty($url) || $userRole == 'user')
		{
			switch($url['action']){
				case 'delete' : $actionName = "-";
								$url['action'] = '';
								$options += ['class'=>'btn disabled'];
								break;

				case 'edit'    : $actionName = "-";
								$url['action']='';
								$options+=['class'=>'btn disabled'];
								break;
				}

				
		}

		else if(!empty($user) && !empty($url)){
			
			if($user == 'user')
			{
				switch($url['action']){
					case 'delete' : $actionName = "-";
						    		$url['action'] = '';
						    		$options+=['class'=>'btn disabled'];
				}
			
			}
	 		
		}
		
		

		if($actionName == "delete" || $actionName 	== "Delete"){
			
			
			if(!empty($url)) 
				$options+= ['confirm' => __('Are you sure you want to delete # {0}?'), $url[0]];
 			
 			return $this->Form->postLink(__($actionName), $url, $options); 

		}
		

			return  $this->Html->link(__($actionName), $url,$options) ;

		
	}

}		