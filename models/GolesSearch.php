<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goles;

/**
 * GolesSearch represents the model behind the search form of `app\models\Goles`.
 */
class GolesSearch extends Goles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_goles', 'id_jugador', 'goles'], 'integer'],
            [['fechaBono'], 'safe'],
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
        $query = Goles::find();

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
            'id_goles' => $this->id_goles,
            'id_jugador' => $this->id_jugador,
            'goles' => $this->goles,
            'fechaBono' => $this->fechaBono,
        ]);

        return $dataProvider;
    }
}
