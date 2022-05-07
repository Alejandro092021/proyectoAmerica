<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-blue-100 rounded-md font-semibold text-xs text-blue-700 tracking-widest shadow-sm hover:text-blue-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-blue-800 active:bg-blue-50 disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    })
</script>