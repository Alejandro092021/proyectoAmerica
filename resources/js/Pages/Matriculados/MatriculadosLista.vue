<template>
  <MainLayout>
    <Head title="Matriculados" />
    <div class="py-2 overflow-y-auto h-full">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class="px-2">
          <div class="flex justify-between">
            <h2
              class="
                my-3
                text-2xl
                font-semibold
                text-blue-900
                dark:text-gray-200
              "
            >
              Lista de Matriculados
            </h2>
          </div>
          <div>
            <div class="flex flex-col flex-wrap sm:flex-row">
              <div
                class="
                  shadow-lg
                  rounded-2xl
                  p-4
                  bg-white
                  dark:bg-gray-700
                  w-full
                "
              >
                <div class="flex justify-between mb-4">
                  <Link
                    v-role="'Super admin'"
                    :href="route('matriculados.create')"
                  >
                    <JetButton class="my-1">
                      Agregar
                      <span class="ml-2" aria-hidden="true">+</span>
                    </JetButton>
                  </Link>
                  <Link
                    v-role="'Director de colegio'"
                    :href="route('matriculados.create')"
                  >
                    <JetButton class="my-1">
                      Agregar
                      <span class="ml-2" aria-hidden="true">+</span>
                    </JetButton>
                  </Link>

                  <div class="m-1">

                  <JetButton @click="ExportExcel" class=" bg-green-400 hover:bg-green-500 active:bg-green-900 focus:border-green-900 focus:ring focus:ring-green-300 ">
                    Exportar Excel
                  </JetButton>
                </div>


                  <div>
                    <label class="w-full text-sm">
                      <JetInput
                        placeholder="Buscar por Usuario."
                        v-model="form.buscar"
                        type="text"
                      />
                    </label>
                  </div>
                </div>

                <JetTable class="mb-6">
                  <template #col>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Tipo de Modalidad</th>
                    <th class="px-4 py-3">Tipo de Módulo</th>
                    <th class="px-4 py-3 text-center">Tipo de Estudio</th>
                    <th class="px-2 py-3 text-center">Nivel</th>
                    <th class="px-2 py-3 text-center">Grado</th>
                    <th class="px-2 py-3 text-center">Cantidad</th>
                    <th class="px-4 py-3">Acciones</th>
                  </template>
                  <template #row>
                    <tr
                      class="
                        text-gray-500
                        hover:bg-gray-200
                        dark:hover:bg-gray-600 dark:text-gray-300
                      "
                      v-for="(m, index) in matriculados.data"
                      :key="m.id"
                    >
                      <td class="px-4 py-1">{{ index + 1 }}</td>
                      <td class="px-4 py-1">{{ m.name }}</td>

                      <td class="px-4 py-1">
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modalidad == 'Presencial'"
                          >{{ m.modalidad }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modalidad == 'SemiPresencial'"
                          >{{ m.modalidad }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modalidad == 'Distancia'"
                          >{{ m.modalidad }}</span
                        >
                      </td>
                      <td class="px-4 py-1">
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modulo == 'Matriculados'"
                          >{{ m.modulo }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modulo == 'Asistencias'"
                          >{{ m.modulo }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modulo == '3'"
                          >{{ m.modulo }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modulo == 'Riesgo de Abandono'"
                          >{{ m.modulo }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modulo == 'Vacunados'"
                          >{{ m.modulo }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.modulo == 'Docentes'"
                          >{{ m.modulo }}</span
                        >
                      </td>
                      <td class="px-4 py-1">
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.educacion == 'Basica Regular'"
                          >{{ m.educacion }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.educacion == 'Basica Especial'"
                          >{{ m.educacion }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.educacion == 'Basica Alternativa'"
                          >{{ m.educacion }}</span
                        >
                      </td>
                      <td class="px-4 py-1">
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.nivel == 'Inicial'"
                          >{{ m.nivel }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.nivel == 'Primaria'"
                          >{{ m.nivel }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.nivel == 'Secundaria'"
                          >{{ m.nivel }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.nivel == 'Intermedio'"
                          >{{ m.nivel }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.nivel == 'Avanzado'"
                          >{{ m.nivel }}</span
                        >
                      </td>
                      <td class="px-4 py-1">
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == '3 años'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == '4 años'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == '5 años'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Primer Grado'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Segundo Grado'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Tercer Grado'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Cuarto Grado'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Quinto Grado'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Sexto Grado'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Primer Año'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Segundo Año'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Tercer Año'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Cuarto Año'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Quinto Año'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Intermedio'"
                          >{{ m.grado }}</span
                        >
                        <span
                          class="
                            text-black
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="m.grado == 'Avanzado'"
                          >{{ m.grado }}</span
                        >
                      </td>
                      <td class="px-4 py-1">{{ m.cantidad }}</td>
                      <!--<td class="px-4 py-1">{{ u.email }}</td>-->

                      <!--  -->

                      <td class="px-4 py-1">
                        <div class="flex items-center space-x-4 text-sm">
                          <!--<template v-if="m.id === 1">
                            <Link
                              v-role="'Super admin'"
                              method="GET"
                              as="button"
                              type="button"
                              class="mx-1 text-blue-500"
                              :href="route('matriculados.edit', { matriculado: m })"
                            >
                              <button type="button">
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                  ></path>
                                </svg>
                              </button>
                            </Link>
                          </template>-->
                          <!--<template v-else>-->

                          <Link
                            class="mx-1 text-blue-500"
                            method="GET"
                            as="button"
                            type="button"
                            :href="
                              route('matriculados.edit', { matriculado: m })
                            "
                          >
                            <button type="button">
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                              </svg>
                            </button>
                          </Link>

                          <!--</template>-->
                        </div>
                      </td>
                    </tr>

                    <tr v-if="matriculados.data.length === 0">
                      <td class="px-4 py-1" colspan="10">
                        <p
                          class="
                            text-sm text-center text-gray-700
                            dark:text-gray-300
                          "
                        >
                          No existen Trabajadores
                        </p>
                      </td>
                    </tr>
                  </template>

                  <template #pagination>
                    <JetPagination
                      :links="matriculados.links"
                      :total="matriculados.total"
                      :to="matriculados.to"
                      :from="matriculados.from"
                    />
                  </template>
                </JetTable>
              </div>
            </div>
          </div>
          {{matriculados}}
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script>
import { defineComponent } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import JetTable from "@/Componentes/Table.vue";
import JetPagination from "@/Componentes/Pagination.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetButton from "@/Componentes/Button.vue";
import JetDeleteButton from "@/Componentes/DeleteButton.vue";
import JetCancelButton from "@/Componentes/CancelButton.vue";
import JetLabel from "@/Componentes/Label.vue";
import JetInput from "@/Componentes/Input.vue";
import JetConfirmationModal from "@/Componentes/ConfirmationModal.vue";
import throttle from "lodash/throttle";

export default defineComponent({
  components: {
    Head,
    MainLayout,
    JetTable,
    Link,
    MainLayout,
    JetPagination,
    JetButton,
    JetDeleteButton,
    JetCancelButton,
    JetInput,
    JetLabel,
    JetConfirmationModal,
  },
  props: {
    matriculados: Object,
  },
  data() {
    return {
      form: {
        buscar: "",
      },
      Abrir: false,
      usuario: null,
    };
  },
  methods: {
    ConfirmarEstado(u) {
      this.usuario = u;
      this.AbrirModal();
    },

    CambiarEstadoUsuario(u) {
      this.CerrarModal();
      this.$inertia.delete(route("usuarios.destroy", u.id), {
        onSuccess: () => {
          this.$notify(
            {
              group: "mensajes",
              type: "success",
              title: "Exíto",
              text: "Estado modificado correctamente",
            },
            2000
          );
        },
        onError: (errors) => {
          this.$notify(
            {
              group: "mensajes",
              type: "error",
              title: "Error",
              text: "Estado no modificado",
            },
            2000
          );
        },
      });
    },
    AbrirModal() {
      this.Abrir = true;
    },

    CerrarModal() {
      this.Abrir = false;
    },
    ConfirmarEliminar(u) {
      this.Usuario = u;
      this.AbrirModal();
    },
    EliminarUsuario(id) {
      this.CerrarModal();
      this.$inertia.delete(route("usuarios.destroy", id), {
        onSuccess: () => {
          this.$notify(
            {
              group: "mensajes",
              type: "success",
              title: "Exíto",
              text: "Usuario eliminado correctamente",
            },
            2000
          );
        },
        onError: (errors) => {
          this.$notify(
            {
              group: "mensajes",
              type: "error",
              title: "Error",
              text: "Usuario no eliminado",
            },
            2000
          );
        },
      });
    },
    ExportExcel() {

      let paramString = new URLSearchParams(this.form);

      window.open(`/exportMatriculados?${paramString.toString()}`);

    },
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(route("matriculados.index"), this.form, {
          preserveState: true,
        });
      }, 150),
    },
  },
});
</script>
