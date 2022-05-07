<template>
  <button
    :type="type"
    class="
      w-full
      px-5
      py-3
      font-semibold
      bg-red-400
      text-xs
      font-medium
      leading-5
      text-white
      transition-colors
      duration-150
      border border-red-400
      dark:border-red-500
      rounded-lg
      sm:px-4 sm:py-2 sm:w-auto
      active:bg-red-900
      focus:bg-red-500 focus:outline-none
      hover:bg-red-500
      uppercase
      tracking-widest
    "
  >
    <slot></slot>
  </button>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    type: {
      type: String,
      default: "submit",
    },
  },
});
</script>