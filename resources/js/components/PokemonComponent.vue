<template>
    <ul class="list-group">
      <li class="list-group-item" v-for="(p, index) in pokemon.slice(0,151)">
          <img class="mr-3" :src="'/images/pokemon/' + (index + 1) + '.png'" :alt="ucwords(p.name)">
          <div class="media-body">
            <h5 class="mt-0"><a :href="'/pokemon/' + (index + 1)">{{ ucwords(p.name) }}</a></h5>
          </div>
      </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                pokemon: []
            }
        },
        created() {
            this.fetchPokemon();
        },
        methods : {
            fetchPokemon() {
                fetch('/api/v1/pokemon')
                    .then(res => res.json())
                    .then(res => {
                        this.pokemon = res.results;
                    })
            }
        }
    }
</script>
