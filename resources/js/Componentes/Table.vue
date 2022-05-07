<template>
    <div class="w-full overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800">
                <slot name="col"></slot>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <slot name="row"></slot>                     
            </tbody>
        </table>
        </div>
        <slot name="pagination"></slot>
    </div>
</template>

<script>

export default {

}
</script>
