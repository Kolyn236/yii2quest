<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Issue;

/**
 * IssueSearch represents the model behind the search form about `app\models\Issue`.
 */
class IssueSearch extends Issue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'author', 'active', 'ready', 'executor'], 'integer'],
            [['date', 'description', 'deadLine'], 'safe'],
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
        $query = Issue::find();

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
            'author' => $this->author,
            'date' => $this->date,
            'deadLine' => $this->deadLine,
            'active' => $this->active,
            'ready' => $this->ready,
            'executor' => $this->executor,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
