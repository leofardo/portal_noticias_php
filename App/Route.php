<?php
	
	namespace App;

	use MF\Init\Bootstrap;

	class Route extends Bootstrap{

		protected function initRoutes(){
			$routes['home'] = [
				'route' => '/',
				'controller' => 'indexController',
				'action' => 'index'
			];

			$routes['create'] = [
				'route' => '/create',
				'controller' => 'indexController',
				'action' => 'create'
			];

			$routes['add-crud'] = [
				'route' => '/add-crud',
				'controller' => 'crudController',
				'action' => 'add'
			];

			$routes['delete'] = [
				'route' => '/delete',
				'controller' => 'crudController',
				'action' => 'delete'
			];

			$routes['alter'] = [
				'route' => '/alter',
				'controller' => 'indexController',
				'action' => 'alter'
			];

			$routes['alter-crud'] = [
				'route' => '/alter-crud',
				'controller' => 'crudController',
				'action' => 'alter'
			];


			// LOGIN E REGISTRO

			$routes['login'] = [
				'route' => '/login',
				'controller' => 'accountsController',
				'action' => 'login'
			];

			$routes['registrar'] = [
				'route' => '/registrar',
				'controller' => 'accountsController',
				'action' => 'registrar'
			];

			$routes['account-create'] = [
				'route' => '/account-create',
				'controller' => 'crudController',
				'action' => 'registrar'
			];

			$routes['validate-login'] = [
				'route' => '/validate-login',
				'controller' => 'crudController',
				'action' => 'login'
			];

			$routes['logoff'] = [ 
				'route' => '/logoff',
				'controller' => 'crudController',
				'action' => 'logoff'
			];

			$routes['contas'] = [ 
				'route' => '/contas',
				'controller' => 'accountsController',
				'action' => 'contas'
			];

			$routes['upgrade'] = [ 
				'route' => '/upgrade',
				'controller' => 'crudController',
				'action' => 'promover'
			];

			$this->setRoutes($routes);
		}
	}	

?>