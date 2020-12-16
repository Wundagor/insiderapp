<template>
    <div>
        <div v-if="!end && week && items.length">
            <h5 class="my-3">{{ title }}</h5>
            <div v-for="item in items">
                <div class="row">
                    <div class="col-8">{{ item.team.name }}</div>
                    <div class="col-4 text-right">{{ item.percent }}%</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "VPredictions",
    props: ['items', 'week', 'end'],
    computed: {
        title() {
            return `${this.week}th Week Predictions of Championship`;
        }
    }
}
</script>
