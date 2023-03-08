<template>
    <div v-if="$page.props.alert.message" class="alert alert-dismissible"
         :class="`alert-${ $page.props.alert.type }`" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ $page.props.alert.message }}
    </div>
</template>

<script>
export default {
    name: "Alert"
}
</script>

<style scoped>

</style>
