<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equines;

/**
 * EquinesSearch represents the model behind the search form of `app\models\Equines`.
 */
class EquinesSearch extends Equines
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gait_id', 'age', 'active'], 'integer'],
            [['name', 'gender', 'location', 'color', 'stud_farm', 'vet', 'colletion_days', 'about_me', 'history', 'images', 'owner', 'created', 'created_by', 'modified', 'modified_by'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Equines::find();

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
            'gait_id' => $this->gait_id,
            'age' => $this->age,
            'active' => $this->active,
            'created' => $this->created,
            'modified' => $this->modified,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'stud_farm', $this->stud_farm])
            ->andFilterWhere(['like', 'vet', $this->vet])
            ->andFilterWhere(['like', 'colletion_days', $this->colletion_days])
            ->andFilterWhere(['like', 'about_me', $this->about_me])
            ->andFilterWhere(['like', 'history', $this->history])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
