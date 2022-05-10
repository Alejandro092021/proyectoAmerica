<template>
  <nav class="mt-6">

    <div class="flex flex-col w-full">
      <Link :href="route('inicio')" class="relative">
        <span
          class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
          :class="{
            'bg-red-600': route().current('inicio'),
          }"
          aria-hidden="true"
        ></span>
        <div
          class="inline-flex items-center px-6 py-3 w-full text-base transition-colors duration-150 hover:bg-red-600 hover:bg-opacity-25 dark:hover:text-gray-200 dark:text-gray-100"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
          </svg>
        </div>
      </Link>

      <p class="p-1 text-xs uppercase text-gray-400">MODULOS nuevos</p>

      <Link class="relative" href="#">
        <span
          class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
          aria-hidden="true"
        ></span>
        <div
          class="inline-flex items-center px-6 py-3 w-full text-base transition-colors duration-150 hover:bg-red-600 hover:bg-opacity-25 dark:hover:text-gray-200 dark:text-gray-100"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
            ></path>
          </svg>
        </div>
      </Link>

      <Link class="relative" href="#">
        <span
          class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
          aria-hidden="true"
        ></span>
        <div
          class="inline-flex items-center px-6 py-3 w-full text-base transition-colors duration-150 hover:bg-red-600 hover:bg-opacity-25 dark:hover:text-gray-200 dark:text-gray-100"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
            />
          </svg>
        </div>
      </Link>

      <Link class="w-full justify-start linkClass" href="#"> </Link>

      <p class="p-1 text-xs uppercase text-gray-400">AJUSTES</p>
      <Link
        v-permission="'ver:usuario'"
        :href="route('usuarios.index')"
        class="relative"
      >
        <span
          class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
          :class="{
            'bg-red-600': route().current('usuarios.*'),
          }"
          aria-hidden="true"
        ></span>
        <div
          class="inline-flex items-center px-6 py-3 w-full text-base transition-colors duration-150 hover:bg-red-600 hover:bg-opacity-25 dark:hover:text-gray-200 dark:text-gray-100"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
            />
          </svg>
        </div>
      </Link>

      <Link
        v-permission="'ver:rol'"
        :href="route('roles.index')"
        class="relative"
      >
        <span
          class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
          :class="{
            'bg-red-600': route().current('roles.*'),
          }"
          aria-hidden="true"
        ></span>
        <div
          class="inline-flex items-center px-6 py-3 w-full text-base transition-colors duration-150 hover:bg-red-600 hover:bg-opacity-25 dark:hover:text-gray-200 dark:text-gray-100"
        >
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
            ></path>
          </svg>
        </div>
      </Link>
      <Link
        v-permission="'ver:permiso'"
        :href="route('permisos.index')"
        class="relative"
      >
        <span
          class="absolute inset-y-0 left-0 w-1 bg-white rounded-tr-lg rounded-br-lg"
          :class="{
            'bg-red-600': route().current('permisos.*'),
          }"
          aria-hidden="true"
        ></span>
        <div
          class="inline-flex items-center px-6 py-3 w-full text-base transition-colors duration-150 hover:bg-red-600 hover:bg-opacity-25 dark:hover:text-gray-200 dark:text-gray-100"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"
            />
          </svg>
        </div>
      </Link>
    </div>
  </nav>
</template>

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import IconItem from "@/Icons/Item.vue";

export default defineComponent({
  components: {
    Link,
    IconItem,
  },
  data() {
    return {};
  },
});
</script>
