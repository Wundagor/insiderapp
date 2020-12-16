<template>
    <div>
        <button type="button" :class="classes" :disabled="disabled" @click="click" v-if="!loader">{{ text }}</button>
        <button :class="classes" type="button" disabled v-if="loader">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Simulation...
        </button>
    </div>
</template>

<script>
export default {
    name: "VButton",
    props: ['text', 'classes', 'loader', 'disabled'],
    methods: {
        click() {
            this.$emit('click');
        }
    }
}
</script>

<style scoped>

</style>
