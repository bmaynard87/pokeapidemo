<template>
    <div>
        <h2>{{ ucwords(pokemon.name) }}</h2>
        <img :src="'/images/pokemon/' + pokemon.id + '.png'" :alt="ucwords(pokemon.name)">
        <p>Type(s)</p>
        <ul>
            <li v-for="type in pokemon.types">{{ ucwords(type.type.name) }}</li>
        </ul>
        <p>Move(s)</p>
        <ul>
            <li v-for="move in pokemon.moves">{{ ucwords(move.move.name) }}</li>
        </ul>
        <a v-if="pokemon.id > 1" :href="'/pokemon/' + (pokemon.id - 1)">Previous</a>
        <br>
        <a v-if="pokemon.id < 151" :href="'/pokemon/' + (pokemon.id + 1)">Next</a>
    </div>
</template>

<script>
export default {
    props: ['pokemonId'],
    data() {
        return {
            pokemon: {},
            pokemonCount: 0
        }
    },
    created() {
        this.fetchSinglePokemon();
    },
    methods : {
        fetchSinglePokemon() {
            fetch('/api/v1/pokemon/' + this.pokemonId)
                .then(res => res.json())
                .then(res => {
                    this.pokemon = res;
                });
        }
    }
}
</script>
