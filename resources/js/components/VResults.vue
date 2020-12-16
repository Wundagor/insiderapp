<template>
    <div>
        <div v-if="items.length">
            <h2>Match Results</h2>
            <h5 class="my-3">{{ title }}</h5>
            <div v-for="item in items">
                <div class="row">
                    <div class="col-5">{{ item.home_team.name }}</div>
                    <div class="col-2 text-center">{{ item.score }}</div>
                    <div class="col-5 text-right">{{ item.away_team.name }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "VResults",
    props: ['items', 'week'],
    computed: {
        title() {
            return `${this.week}th Week Match Result`;
        }
    }
}
</script>
