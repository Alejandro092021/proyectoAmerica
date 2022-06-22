<template>
  <MainLayout>
    <Head title="Usuarios" />

    <div class="py-2 overflow-y-auto h-full">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class="overflow-hidden px-2">
          <div class="flex justify-between">
            <h2
              class="
                my-3
                text-2xl
                font-semibold
                text-gray-600
                dark:text-gray-200
              "
            >
              Información Usuario
            </h2>

            <Link :href="route('usuarios.index')">
              <JetButton class="ml-2"> Regresar </JetButton>
            </Link>
          </div>

          <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full"
          >
            <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-3">
              <!-- Card Name-->
              <div
                class="
                  flex
                  items-center
                  p-4
                  w-full
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-red-500
                    bg-red-100
                    rounded-full
                    dark:text-yellow-100 dark:bg-yellow-500
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
                    />
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Name
                  </p>
                  <div class="flex space-x-2" v-for="u in Usuario" :key="u.id">
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.name }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card Cargo-->
              <div
                class="
                  flex
                  items-center
                  w-full
                  p-4
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-purple-500
                    bg-purple-100
                    rounded-full
                    dark:text-green-100 dark:bg-green-500
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Cargo
                  </p>
                  <div
                    class="flex space-x-2"
                    v-for="u in Usuario"
                    :key="u.Cargo"
                  >
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.campo }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card Apellido Materno-->
              <div
                class="
                  flex
                  items-center
                  w-full
                  p-4
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-blue-500
                    bg-blue-100
                    rounded-full
                    dark:text-green-100 dark:bg-green-500
                  "
                >
                  <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Fecha de Registro
                  </p>
                  <div
                    class="flex space-x-2"
                    v-for="u in Usuario"
                    :key="u.created_at"
                  >
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.created_at }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex justify-between">
            <h2
              class="
                my-3
                text-2xl
                font-semibold
                text-gray-600
                dark:text-gray-200
              "
            >
              Información Personal
            </h2>
          </div>
          <div
            class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full"
          >
            <div class="grid gap-6 mb-2 md:grid-cols-1 xl:grid-cols-1">
              <!-- Card -->

              <div>
                <div
                  class="
                    flex
                    items-center
                    p-4
                    w-auto
                    bg-gray-100
                    rounded-lg
                    border border-white
                    dark:border-gray-800 dark:bg-gray-800
                    cursor-pointer
                    transition
                    duration-500
                    ease-in-out
                    transform
                    hover:-translate-y-1 hover:shadow-lg
                  "
                >
                  <div
                    class="
                      p-3
                      mr-4
                      text-purple-400
                      bg-purple-100
                      rounded-full
                      dark:text-yellow-100 dark:bg-purple-400
                    "
                  >
                    <svg
                      class="w-6 h-6"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      ></path>
                    </svg>
                  </div>
                  <div>
                    <p
                      class="
                        mb-2
                        text-sm
                        font-medium
                        text-gray-600
                        dark:text-gray-400
                      "
                    >
                      Datos Adicionales del Usuario
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-3">
              <!-- Card Nombres-->
              <div
                v-show="Usuario.name != ''"
                class="
                  flex
                  items-center
                  p-4
                  w-full
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-yellow-500
                    bg-yellow-100
                    rounded-full
                    dark:text-yellow-100 dark:bg-yellow-500
                  "
                >
                  <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Nombres
                  </p>
                  <div class="flex space-x-2" v-for="u in Usuario" :key="u.id">
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.nombres }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card Apellido Paterno-->
              <div
                v-show="Usuario.apellidoPaterno != ''"
                class="
                  flex
                  items-center
                  w-full
                  p-4
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-green-500
                    bg-green-100
                    rounded-full
                    dark:text-green-100 dark:bg-green-500
                  "
                >
                  <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Apellido Paterno
                  </p>
                  <div
                    class="flex space-x-2"
                    v-for="u in Usuario"
                    :key="u.apellidoPaterno"
                  >
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.apellidoPaterno }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card Apellido Materno-->
              <div
                v-show="Usuario.apellidoMaterno != ''"
                class="
                  flex
                  items-center
                  w-full
                  p-4
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-green-500
                    bg-green-100
                    rounded-full
                    dark:text-green-100 dark:bg-green-500
                  "
                >
                  <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Apellido Materno
                  </p>
                  <div
                    class="flex space-x-2"
                    v-for="u in Usuario"
                    :key="u.apellidoMaterno"
                  >
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.apellidoMaterno }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card Correo-->
              <div
                v-show="Usuario.correo != ''"
                class="
                  flex
                  items-center
                  w-full
                  p-4
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-red-500
                    bg-red-100
                    rounded-full
                    dark:text-green-100 dark:bg-green-500
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    />
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Correo
                  </p>
                  <div
                    class="flex space-x-2"
                    v-for="u in Usuario"
                    :key="u.correo"
                  >
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.correo }}
                    </p>
                  </div>
                </div>
              </div>

              <!-- Card Telefono-->
              <div
                class="
                  flex
                  items-center
                  p-4
                  w-full
                  bg-gray-100
                  rounded-lg
                  border border-white
                  dark:border-gray-800 dark:bg-gray-800
                  cursor-pointer
                  transition
                  duration-500
                  ease-in-out
                  transform
                  hover:-translate-y-1 hover:shadow-lg
                "
              >
                <div
                  class="
                    p-3
                    mr-4
                    text-blue-500
                    bg-blue-100
                    rounded-full
                    dark:text-blue-100 dark:bg-blue-500
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    />
                  </svg>
                </div>
                <div>
                  <p
                    class="
                      mb-2
                      text-sm
                      font-medium
                      text-gray-600
                      dark:text-gray-400
                    "
                  >
                    Telefono
                  </p>
                  <div
                    class="flex space-x-2"
                    v-for="u in Usuario"
                    :key="u.telefono"
                  >
                    <p
                      class="
                        text-md
                        font-semibold
                        text-gray-700
                        dark:text-gray-200
                        leading-normal
                        md:leading-relaxed
                      "
                    >
                      {{ u.telefono }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script>
import { defineComponent } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetButton from "@/Componentes/Button.vue";
import JetDeleteButton from "@/Componentes/DeleteButton.vue";
import JetCancelButton from "@/Componentes/CancelButton.vue";
import JetLabel from "@/Componentes/Label.vue";
import JetInput from "@/Componentes/Input.vue";

export default defineComponent({
  components: {
    Head,
    MainLayout,
    Link,
    MainLayout,
    JetButton,
    JetDeleteButton,
    JetCancelButton,
    JetInput,
    JetLabel,
  },
  props: {
    Usuario: Object,
  },
  data() {
    return {};
  },
});
</script>
