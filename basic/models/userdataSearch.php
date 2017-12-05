<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\userdata;

/**
 * userdataSearch represents the model behind the search form of `app\models\userdata`.
 */
class userdataSearch extends userdata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_fk'], 'integer'],
            [['userIp', 'browser'], 'safe'],
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
        $query = userdata::find();

        // add conditions that should always apply here

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
            'id_fk' => $this->id_fk,
        ]);

        $query->andFilterWhere(['like', 'userIp', $this->userIp])
            ->andFilterWhere(['like', 'browser', $this->browser]);

        return $dataProvider;
    }
}
