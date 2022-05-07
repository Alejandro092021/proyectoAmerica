<template>
  <MainLayout>
    <Head title="Roles Editar" />
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
              Editar roles
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
                <form @submit.prevent="EditarRol">
                  <div class="grid grid-cols-1 md:grid-cols-1 md:gap-8">
                    <div>
                      <JetLabel for="nombre" value="Nombre:" />
                      <JetInput
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.name.$error,
                        }"
                      />
                      <div
                        v-if="errors.name"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.name }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.name.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="block mx-1">
                    <label class="block mx-1">
                      <JetLabel for="nombre" value="Permisos:" />
                      <div class="flex flex-wrap mt-1">
                        <div
                          class="w-1/3"
                          v-for="p in PermisosMostrar()"
                          :key="p.id"
                        >
                          <label class="inline-flex items-center mt-2">
                            <input
                              type="checkbox"
                              v-model="p.checked"
                              class="
                                rounded
                                border-green-300
                                text-green-400
                                shadow-sm
                                focus:border-green-500
                                focus:ring
                                focus:ring-green-200
                                focus:ring-opacity-50
                              "
                              :id="p.id"
                            />
                            <span
                              class="ml-2 text-gray-700 dark:text-white"
                              :for="p.id"
                              >{{ p.name }}</span
                            >
                          </label>
                        </div>
                      </div>
                    </label>
                  </div>
                  <JetButton
                    class="my-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing || v$.form.$invalid"
                    >Editar</JetButton
                  >
                </form>
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
import { Head, Link } from "@inertiajs/inertia-vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import JetButton from "@/Componentes/Button.vue";
import JetInput from "@/Componentes/Input.vue";
import JetLabel from "@/Componentes/Label.vue";
import JetCheckbox from "@/Componentes/Checkbox.vue";
import useVuelidate from "@vuelidate/core";
import { required, maxLength, helpers } from "@vuelidate/validators";

export default defineComponent({
  components: {
    MainLayout,
    Head,
    Link,
    JetButton,
    JetInput,
    JetLabel,
    JetCheckbox,
  },
  props: {
    roles: Object,
    permissions: Object,
    errors: Object,
  },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      form: this.$inertia.form({
        id: this.$props.roles.id,
        name: this.$props.roles.name,
        Permisos: [],
      }),
    };
  },
  validations() {
    return {
      form: {
        name: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          maxLength: helpers.withMessage(
            "La contraseña debe tener una longitud máxima permitida es 50 letras.",
            maxLength(30)
          ),

          $autoDirty: true,
        },
      },
    };
  },
  methods: {
    PermisosMostrar() {
      return (this.form.Permisos = this.$props.permissions.map((p) => ({
        id: p.id,
        checked: this.PermisosActivos(p.id),
        name: p.name,
      })));
    },
    PermisosActivos(id) {
      return (
        this.$props.roles.permissions.find(
          (paramPermission) => paramPermission.id === id
        ) !== undefined
      );
    },
    EditarRol() {
      this.form.put(
        route("roles.update", this.form.id),

        {
          onSuccess: () => {
            this.$notify(
              {
                group: "mensajes",
                type: "success",
                title: "Exíto",
                text: "Rol actualizado correctamente",
              },
              2000
            );
          },
          onError: (errors) => {
            console.log(errors);
            this.$notify(
              {
                group: "mensajes",
                type: "error",
                title: "Error",
                text: "Rol no actualizado",
              },
              2000
            );
          },
        }
      );
    },
  },
});
</script>
