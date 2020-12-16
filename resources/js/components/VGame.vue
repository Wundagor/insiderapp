<template>
    <div>
        <div class="cssload-container" v-if="loader">
            <div class="cssload-loading"><i></i><i></i></div>
        </div>
        <div class="container mt-5" v-if="!loader">
            <div class="row">
                <div class="col-md-6">
                    <v-table :items="data.table" :end="end" />
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <v-button text="Reset" classes="btn btn-danger" :loader="btnLoaders.reset" @click="reset" />
                            <v-button
                                text="Play All"
                                classes="btn btn-success ml-1"
                                :loader="btnLoaders.playAll"
                                :disabled="end"
                                @click="playAll"
                            />
                        </div>
                        <div>
                            <v-button
                                text="Next Week"
                                classes="btn btn-primary"
                                :loader="btnLoaders.nextWeek"
                                :disabled="end"
                                @click="nextWeek"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <v-results :items="data.games" :week="data.week" />
                    <v-predictions :items="data.predictions" :week="data.week" :end="end" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VTable from "./VTable";
import VResults from "./VResults";
import VPredictions from "./VPredictions";
import VButton from "./VButton";

export default {
    name: "VGame",
    components: {
        VTable,
        VResults,
        VPredictions,
        VButton
    },
    data() {
        return {
            data: {},
            btnLoaders: {
                reset: false,
                playAll: false,
                nextWeek: false
            }
        }
    },
    computed: {
        loader() {
            return !this.data?.table;
        },
        end() {
            return this.data?.week === 6 || false;
        }
    },
    methods: {
        async fetchData() {
            const { data } = await window.axios.get('/v1');
            this.setDefaultLoaders();
            this.data = data.data;
        },
        async reset() {
            this.btnLoaders.reset = true;
            await window.axios.post('/v1/reset');
            await this.fetchData();
        },
        async play(all = false) {
            await window.axios.post('/v1/play', { all });
            await this.fetchData();
        },
        async playAll() {
            this.btnLoaders.playAll = true;
            await this.play(true);
        },
        async nextWeek() {
            this.btnLoaders.nextWeek = true;
            await this.play();
        },
        setDefaultLoaders() {
            this.btnLoaders =  {
                reset: false,
                playAll: false,
                nextWeek: false
            }
        }
    },
    created() {
        this.fetchData();
    }
}
</script>

