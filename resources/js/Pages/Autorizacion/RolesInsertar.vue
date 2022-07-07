<template>
  <MainLayout>
    <Head title="Roles Insertar" />
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
              Crear Roles
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
                <form @submit.prevent="GuardarRol">
                  <div class="grid grid-cols-1 md:grid-cols-1 md:gap-8">
                    <div>
                      <JetLabel for="Nombre" value="Nombre:" />
                      <JetInput
                        
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.name"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.name.$error,
                        }"
                        placeholder="Escribir nombre de usuario a quien asignara roles"
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

                      <div >
                        <ul
                        v-if="form.name"
                        class="
                      
                          absolute
                          align-self: center
                          z-10
                          mb-4
                          w-80
                          
                          flex flex-col
                          rounded-b-lg
                          border border-t-0 border-b-0 border-gray-200
                          shadow-lg
                          bg-white
                        "
                      >
                        <li v-for="n in DatosUsuario" :key="n.id">
                          <button
                            class="
                              p-1
                              text-sm
                              font-medium
                              border-b border-gray-200
                              cursor-pointer
                              hover:bg-orange-50
                              block
                              w-full
                            "
                            @click="llenarnombre(n.id, n.name)"
                          >
                            <div>
                              <div>
                                {{ n.name }} 
                              </div>
                            </div>
                          </button>
                        </li>
                        
                      </ul>
                      </div>

                      <div
                          v-if="!userexists"
                          class="p-4 w-full rounded-b-lg shadow my-0 text-sm"
                        >
                          No se encontraron resultados para:
                          <strong>{{ form.name }}.</strong>
                        </div>

                    </div>
                  </div>

                  <div class="block mx-1">
                    <JetLabel for="permisos" value="Permisos:" />
                    <div class="flex flex-wrap mt-1">
                      <div class="w-1/3" v-for="p in permissions" :key="p.id">
                        <label class="inline-flex items-center mt-2">
                          <input
                            type="checkbox"
                            v-model="form.permissions"
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
                            :value="p.id"
                          />
                          <span class="ml-2 text-gray-700 dark:text-white">{{
                            p.name
                          }}</span>
                        </label>
                      </div>
                      <div
                        v-for="(error, index) of v$.form.permissions.$errors"
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

                  <JetButton
                    class="my-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing || v$.form.$invalid"
                  >
                    Guardar
                  </JetButton>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{this.DatosUsuario}}
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
      DatosUsuario: [],
      userexists: true,
      form: this.$inertia.form({
        _method: "POST",
        name: "",
        permissions: [],
        userid:"",
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
        permissions: [
          {
            required: helpers.withMessage(
              "Este campo no puede estar vacío",
              required
            ),
          },
        ],
      },
    };
  },
  methods: {
    llenarnombre(id, nombre) {
      console.log(id + "-" + nombre);
      this.form.name = nombre;
      this.form.userid = id;
      this.DatosUsuario = [];
      

    },
    async nombreusuario() {
      
      if (this.form.name != "") {
        await axios

          .get("/buscarnom/" + this.form.name)
          .then((response) => {
            if (response.data.length > 0) {
            this.userexists = true
            this.DatosUsuario = response.data;  
            }else{
            this.DatosUsuario =[]
            this.userexists = false  
            }
            
            //

             console.log(response.data);
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        this.DatosUsuario = [];
      }
    },
    sololetras($event) {
      var letras = /^[a-zA-ZñÑ\s]*$/;

      if (letras.test(String.fromCharCode($event.charCode))) {
        return true;
      } else {
        $event.preventDefault();
      }
    },
    GuardarRol() {
      this.form.post(route("roles.store"), {
        onSuccess: () => {
          this.form.reset();
          this.$notify(
            {
              group: "mensajes",
              type: "success",
              title: "Exíto",
              text: "Rol registrado correctamente",
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
              text: "Rol no registrado",
            },
            2000
          );
        },
      });
    },
  },
});
</script>
