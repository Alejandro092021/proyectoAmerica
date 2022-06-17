<template>
  <MainLayout>
    <Head title="Instituciones" />
    <div class="py-2 overflow-y-auto h-full">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class="px-2">
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
              Instituciones
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
                  <div class="mb-2">
                    <JetButton
                      @click="ExportExcel"
                      class="
                        bg-green-400
                        hover:bg-green-500
                        active:bg-green-900
                        focus:border-green-900 focus:ring focus:ring-green-300
                      "
                    >
                      Exportar Excel
                    </JetButton>
                  </div>

                  <div>
                    <label class="w-full text-sm">
                        <!-- start tooltip -->
                      <div class="
                          group
                          w-full
                          cursor-pointer
                          relative
                          inline-block
                          text-center
                        ">
                        <!-- start icono editar -->
                        <JetInput
                          placeholder="Buscar por Codigo."
                          v-model="form.buscar"
                          type="text"
                        />
                        <!-- end icono editar -->
                        <div
                          class="
                            opacity-0
                            w-auto
                            bg-yellow-300
                            text-gray-600 text-center text-xs
                            rounded-lg
                            py-1
                            absolute
                            z-10
                            group-hover:opacity-100
                            bottom-full
                            px-2
                            pointer-events-none
                          "
                        >
                          <p>
                            Usted puede realizar una busqueda por Codigo Modular o 
                            Codigo Local
                          </p>
                          <svg
                            class="
                              absolute
                              text-yellow-300
                              h-2
                              w-full
                              left-0
                              top-full
                            "
                            x="0px"
                            y="0px"
                            viewBox="0 0 255 255"
                            xml:space="preserve"
                          >
                            <polygon
                              class="fill-current"
                              points="0,0 127.5,127.5 255,0"
                            />
                          </svg>
                        </div>

                      </div>
                    </label><!-- end tooltip -->
                  </div>
                </div>

                <JetTable class="mb-6">
                  <template #col>
                    <th class="px-2 py-3 text-center">N°</th>
                    <th class="px-2 py-3 text-center">Nombre de Institución</th>
                    <th class="px-2 py-3 text-center">Codigo Modular</th>
                    <th class="px-2 py-3 text-center">Codigo Local</th>
                    <th class="px-2 py-3 text-center">Provincia</th>
                    <th class="px-2 py-3 text-center">Distrito</th>
                    <th class="px-2 py-3 text-center">Direccion</th>
                    <th class="px-2 py-3 text-center">TipoZona</th>
                    <th class="px-2 py-3 text-center">TipoModalidad</th>
                    <th class="px-2 py-3">Acciones</th>
                  </template>

                  <template #row>
                    <tr
                      class="
                        text-gray-500
                        hover:bg-gray-200
                        dark:hover:bg-gray-600 dark:text-gray-300
                      "
                      v-for="(i, index) in Institucion.data"
                      :key="i.id"
                    >
                      <td class="px-2 py-1 text-center">{{ index + 1 }}</td>
                      <td class="px-2 py-1 text-center">
                        {{ i.nombre }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.codigoModular }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.codigoLocal }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.provincia }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.distrito }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.direccion }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.tipoZona }}
                      </td>
                      <td class="px-2 py-1 text-center">
                        {{ i.tipoModalidad }}
                      </td>

                      <td class="px-4 py-1 text-center">
                        <div class="flex items-center space-x-2 text-sm">
                          <Link
                            method="GET"
                            as="button"
                            type="button"
                            class="mx-1 text-yellow-500 hover:text-yellow-600"
                            :href="
                              route('institucion.show', { institucion: i })
                            "
                          >
                            <button type="button">
                              <!-- start tooltip -->
                              <div
                                class="
                                  group
                                  w-5
                                  cursor-pointer
                                  relative
                                  inline-block
                                  text-center
                                "
                              >
                                <!-- start icono ojo -->
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
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                  ></path>
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                  ></path>
                                </svg>
                                <!--end icono ojo -->
                                <div
                                  class="
                                    opacity-0
                                    w-14
                                    bg-yellow-300
                                    text-gray-600 text-center text-xs
                                    rounded-lg
                                    py-1
                                    absolute
                                    z-10
                                    group-hover:opacity-100
                                    bottom-full
                                    -ml-5
                                    pointer-events-none
                                  "
                                >
                                  <p>Ver</p>
                                  <svg
                                    class="
                                      absolute
                                      text-yellow-300
                                      h-2
                                      w-full
                                      left-0
                                      top-full
                                    "
                                    x="0px"
                                    y="0px"
                                    viewBox="0 0 255 255"
                                    xml:space="preserve"
                                  >
                                    <polygon
                                      class="fill-current"
                                      points="0,0 127.5,127.5 255,0"
                                    />
                                  </svg>
                                </div>
                              </div>
                              <!-- end tooltip -->
                            </button>
                          </Link>

                          <Link
                            class="mx-1 text-blue-500 hover:text-blue-600"
                            method="GET"
                            as="button"
                            type="button"
                            :href="
                              route('institucion.edit', { institucion: i })
                            "
                          >
                            <button type="button">
                              <!-- start tooltip -->
                              <div
                                class="
                                  group
                                  w-5
                                  cursor-pointer
                                  relative
                                  inline-block
                                  text-center
                                "
                              >
                                <!-- start icono editar -->
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
                                <!--end icono editar -->
                                <div
                                  class="
                                    opacity-0
                                    w-16
                                    bg-blue-300
                                    text-gray-600 text-center text-xs
                                    rounded-lg
                                    py-1
                                    absolute
                                    z-10
                                    group-hover:opacity-100
                                    bottom-full
                                    -ml-5
                                    pointer-events-none
                                  "
                                >
                                  <p>Editar</p>
                                  <svg
                                    class="
                                      absolute
                                      text-blue-300
                                      h-2
                                      w-full
                                      left-0
                                      top-full
                                    "
                                    x="0px"
                                    y="0px"
                                    viewBox="0 0 255 255"
                                    xml:space="preserve"
                                  >
                                    <polygon
                                      class="fill-current"
                                      points="0,0 127.5,127.5 255,0"
                                    />
                                  </svg>
                                </div>
                              </div>
                              <!-- end tooltip -->
                            </button>
                          </Link>
                        </div>
                      </td>
                    </tr>

                    <tr v-if="Institucion.data.length === 0">
                      <td class="px-4 py-1" colspan="9">
                        <p
                          class="
                            text-sm text-center text-gray-700
                            dark:text-gray-300
                          "
                        >
                          No existen instituciones
                        </p>
                      </td>
                    </tr>
                  </template>

                  <template #pagination>
                    <JetPagination
                      :links="Institucion.links"
                      :total="Institucion.total"
                      :to="Institucion.to"
                      :from="Institucion.from"
                    />
                  </template>
                </JetTable>
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
    Institucion: Object,
  },
  data() {
    return {
      form: {
        buscar: "",
      },
      Abrir: false,
      paciente: null,
    };
  },
  methods: {
    AbrirModal() {
      this.Abrir = true;
    },

    CerrarModal() {
      this.Abrir = false;
    },
    ConfirmarEstado(p) {
      this.paciente = p;
      this.AbrirModal();
    },
    /*CambiarEstadoPaciente(p) {
      this.CerrarModal();
      this.$inertia.delete(route("pacientes.destroy", p.id), {
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
    },*/

    ExportExcel() {
      let paramString = new URLSearchParams(this.form);

      window.open(`/exportInstitucion?${paramString.toString()}`);
    },
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(route("institucion.index"), this.form, {
          preserveState: true,
        });
      }, 150),
    },
  },
});
</script>
