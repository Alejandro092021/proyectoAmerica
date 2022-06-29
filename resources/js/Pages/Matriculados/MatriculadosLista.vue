<template>
  <MainLayout>
    <Head title="Usuarios" />
    <div class="py-2 overflow-y-auto h-full">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class=" px-2">
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
              Lista Matriculados
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
                  <Link v-role="'Super admin'" 
                  :href="route('matriculados.create')">
                    <JetButton class="my-1">
                      Agregar
                      <span class="ml-2" aria-hidden="true">+</span>
                    </JetButton>
                  </Link>
                  <div>
                    <label class="w-full text-sm">
                      <JetInput
                        placeholder="Buscar por nombre."
                        v-model="form.buscar"
                        type="text"
                      />
                    </label>
                  </div>
                </div>

                <JetTable class="mb-6">
                  <template #col>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Correo</th>
                    <th class="px-4 py-3 text-center">Roles</th>
                    <th class="px-2 py-3 text-center">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                  </template>
                  <template #row>
                    <tr
                      class="
                        text-gray-500
                        hover:bg-gray-200
                        dark:hover:bg-gray-600 dark:text-gray-300
                      "
                      v-for="(u, index) in usuarios.data"
                      :key="u.id"
                    >
                      <td class="px-4 py-1">{{ index + 1 }}</td>
                      <td class="px-4 py-1">{{ u.name }}</td>
                      <td class="px-4 py-1">{{ u.email }}</td>
                      <td class="px-4 py-1">
                        <div class="flex flex-col">
                          <span
                            v-for="r in u.roles"
                            :key="r.id"
                            class="
                              text-white
                              dark:text-gray-700
                              bg-green-300
                              mr-1
                              mb-1
                              px-1
                              rounded-full
                              text-center
                            "
                          >
                            {{ r.name }}
                          </span>
                        </div>
                      </td>

                      <td class="px-2 py-1 text-center">
                        <span
                          class="
                            text-white
                            dark:text-gray-700
                            bg-green-300
                            px-1
                            rounded-full
                          "
                          v-if="u.estado == 'Activado'"
                          >{{u.estado}}</span
                        >
                        <span
                          class="
                            text-white
                            dark:text-gray-700
                            bg-red-300
                            px-1
                            rounded-full
                          "
                          v-if="u.estado == 'Desactivado'"
                          >{{u.estado}}</span
                        >
                      </td>

                      <td class="px-4 py-1">
                        <div class="flex items-center space-x-4 text-sm">
                          <template v-if="u.id === 1">
                            <Link
                              v-role="'Super admin'"
                              method="GET"
                              as="button"
                              type="button"
                              class="mx-1 text-blue-500"
                              :href="route('usuarios.edit', { usuario: u })"
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
                          </template>
                          <template v-else>
                            <Link
                              class="mx-1 text-blue-500"
                              method="GET"
                              as="button"
                              type="button"
                              :href="route('usuarios.edit', { usuario: u })"
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

                            <Link
                            method="GET"
                            as="button"
                            type="button"
                            class="mx-1 text-yellow-500 hover:text-yellow-600"
                            :href="
                              route('usuarios.show', { usuario: u })
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

                          <!--
                            <button
                              type="button"
                              class="text-red-500 hover:text-red-600"
                              @click="ConfirmarEliminar(u.id)"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </button>-->

                            <button type="button" @click="ConfirmarEstado(u)">
                            <!-- start tooltip -->
                            <div
                              v-show="u.estado == 'Desactivado'"
                              class="
                                group
                                w-5
                                cursor-pointer
                                relative
                                inline-block
                                text-center
                              "
                            >
                              <!-- start icono desactivar -->
                              <svg
                                class="
                                  w-5
                                  h-5
                                  text-green-400
                                  hover:text-green-600
                                "
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
                                ></path>
                              </svg>
                              <!--end icono desactivar -->
                              <div
                                class="
                                  opacity-0
                                  w-16
                                  bg-green-300
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
                                <p>Activar</p>
                                <svg
                                  class="
                                    absolute
                                    text-green-300
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
                            <!-- start tooltip -->
                            <div
                              v-show="u.estado == 'Activado'"
                              class="
                                group
                                w-5
                                cursor-pointer
                                relative
                                inline-block
                                text-center
                              "
                            >
                              <!-- start icono activar -->

                              <svg
                                v-show="u.estado == 'Activado'"
                                class="w-5 h-5 text-red-500 hover:text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"
                                ></path>
                              </svg>
                              <!--end icono activar -->
                              <div
                                class="
                                  opacity-0
                                  w-20
                                  bg-red-300
                                  text-gray-600 text-center text-xs
                                  rounded-lg
                                  py-1
                                  absolute
                                  z-10
                                  group-hover:opacity-100
                                  bottom-full
                                  -ml-8
                                  pointer-events-none
                                "
                              >
                                <p>Desactivar</p>
                                <svg
                                  class="
                                    absolute
                                    text-red-300
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

                          </template>
                        </div>
                      </td>
                    </tr>
                    <tr v-if="usuarios.data.length === 0">
                      <td class="px-4 py-1" colspan="9">
                        <p
                          class="
                            text-sm text-center text-gray-700
                            dark:text-gray-300
                          "
                        >
                          No existen usuarios
                        </p>
                      </td>
                    </tr>
                  </template>
                  <template #pagination>
                    <JetPagination
                      :links="usuarios.links"
                      :total="usuarios.total"
                      :to="usuarios.to"
                      :from="usuarios.from"
                    />
                  </template>
                </JetTable>
                
                <JetConfirmationModal :show="Abrir" @close="CerrarModal">
                  <template #title>
                    <p v-show="usuario.estado == 'Activado'">Desactivar Usuario</p>
                    <p v-show="usuariosestado == 'Desactivado'">Activar Usuario</p>
                  </template>

                  <template #content>
                    <p v-show="usuario.estado == 'Activado'">
                      ¿Estas seguro de Desactivar a este Usuario?
                    </p>
                    <p v-show="usuario.estado == 'Desactivado'">
                      ¿Estas seguro de Activar a este Usuario?
                    </p>
                  </template>

                  <template #footer>
                    <JetCancelButton
                      @click="CerrarModal"
                      class="w-full mr-2 mb-2"
                    >
                      Cancelar
                    </JetCancelButton>

                    <JetDeleteButton
                      class="w-full mr-2"
                      type="button"
                      @click="CambiarEstadoUsuario(usuario)"
                    >
                      Aceptar
                    </JetDeleteButton>
                  </template>
                </JetConfirmationModal>
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
    usuarios: Object,
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
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(route("usuarios.index"), this.form, {
          preserveState: true,
        });
      }, 150),
    },
  },
});
</script>
