<template>
    <button :type="type" class="
    w-full
      px-5
      py-3
      font-semibold
      bg-gray-700
      text-xs
      font-medium
      leading-5
      text-white
      transition-colors
      duration-150
      border border-gray-700
      dark:border-gray-500
      rounded-lg
      sm:px-4 sm:py-2 sm:w-auto
      active:bg-gray-900
      focus:bg-gray-500 focus:outline-none
      hover:bg-gray-500
      uppercase
      tracking-widest">
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