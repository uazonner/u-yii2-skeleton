<?php

namespace app\controllers\frontend;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class FrontendController extends Controller
{
	public function init() {

		parent::init();
		$this->layout = '@app/views/frontend/layouts/main';
	}

	public function getViewPath()
	{

		$controllerName = Yii::$app->controller->id;
		$newPath = '@app/views/' . $controllerName;

		return Yii::getAlias($newPath);
	}

	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'only'  => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow'   => true,
						'roles'   => ['@'],
					],
				],
			],
			'verbs' => [
				'class'      => VerbFilter::class,
				'actions'    => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

}