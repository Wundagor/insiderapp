<template>
    <div>
        <h2>League Table</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Teams</th>
                <th scope="col">PTS</th>
                <th scope="col">P</th>
                <th scope="col">W</th>
                <th scope="col">D</th>
                <th scope="col">L</th>
                <th scope="col">GD</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in items" :class="getWinnerRow(index)">
                <th>{{ item.team.name }}</th>
                <td>{{ item.points }}</td>
                <td>{{ item.played }}</td>
                <td>{{ item.won }}</td>
                <td>{{ item.drawn }}</td>
                <td>{{ item.lost }}</td>
                <td>{{ item.gd }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "VTable",
    props: ['items', 'end'],
    methods: {
        getWinnerRow(index) {
            return { 'table-success': this.end && index === 0 }
        }
    }
}
</script>

<style scoped>

</style>
