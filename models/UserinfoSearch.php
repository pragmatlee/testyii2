<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userinfo;

/**
 * UserinfoSearch represents the model behind the search form about `app\models\Userinfo`.
 */
class UserinfoSearch extends Userinfo
{
    /**
     * @inheritdoc
     */
    public $email;
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'sname','email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Userinfo::find()->joinWith(['user']);

        //SELECT * FROM  userss, user_info WHERE user_info.user_id =userss.id AND  userss.email  LIKE 'asd24%';

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sname', $this->sname])
            ->andFilterWhere(['like', 'userss.email' , $this->email]);

        return $dataProvider;
    }
}
