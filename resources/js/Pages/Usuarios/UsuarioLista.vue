<template>
  <MainLayout>
    <Head title="Usuarios" />
    <div class="py-2">
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
              Lista Usuarios
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
                  :href="route('usuarios.create')">
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
                  <template #title> Eliminar usuario </template>

                  <template #content>
                    ¿Estas seguro de Eliminar este usuario?.
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
                      @click="EliminarUsuario(Usuario)"
                    >
                      Eliminar
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
      Usuario: null,
    };
  },
  methods: {
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
