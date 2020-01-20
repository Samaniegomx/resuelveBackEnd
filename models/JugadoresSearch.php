<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jugadores;

/**
 * JugadoresSearch represents the model behind the search form of `app\models\Jugadores`.
 */
class JugadoresSearch extends Jugadores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jugadores', 'id_nivel'], 'integer'],
            [['nombre', 'sueldo', 'bono', 'equipo'], 'safe'],
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
        $query = Jugadores::find();

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
            'id_jugadores' => $this->id_jugadores,
            'id_nivel' => $this->id_nivel,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'sueldo', $this->sueldo])
            ->andFilterWhere(['like', 'bono', $this->bono])
            ->andFilterWhere(['like', 'equipo', $this->equipo]);

        return $dataProvider;
    }
}
