<template>
  <MainLayout>
    <Head title="Servicio Crear" />

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
              SERVICIOS
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
                <form id="formGuardar" @submit.prevent="GuardarInfraestructura">
                  <div class="flex flex-col flex-wrap sm:flex-row mx-10 p-2">
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
                      <div class="flex flex-col md:flex-row">
                        <div class="w-full flex-1 mx-2 mb-2">
                          <div
                            class="
                              py-2
                              text-2xl
                              font-medium
                              text-gray-600
                              dark:text-white
                            "
                          >
                            Informacion de Servicios
                          </div>
                        </div>
                      </div>

                      <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
                        <div class="block mt-4">
                          <JetLabel for="Servicios" value="Servicios:" />

                          <label class="flex items-center">
                            <JetCheckbox
                              type="checkbox"
                              v-model:checked="form.Agua"
                            />
                            <span
                              class="
                                ml-2
                                font-medium
                                text-sm text-gray-700
                                dark:text-white
                              "
                              >Agua</span
                            >
                          </label>
                          <label class="flex items-center">
                            <JetCheckbox
                              type="checkbox"
                              v-model:checked="form.luz"
                            />
                            <span
                              class="
                                ml-2
                                font-medium
                                text-sm text-gray-700
                                dark:text-white
                              "
                              >luz</span
                            >
                          </label>
                          <div
                            v-for="(error, index) of v$.form.ConfirmarDatos
                              .$errors"
                            :key="index"
                          >
                            <div
                              class="
                                text-xs
                                py-2
                                px-2
                                text-red-400
                                dark:text-red-400
                              "
                            >
                              {{ error.$message }}
                            </div>
                          </div>
                        </div>

                        
                      </div>
                      <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                          <div>
                          <JetLabel
                            for="Tanque Reservorio"
                            value="Tanque/Reservorio:"
                          />

                          <select
                            class="
                              border-gray-300
                              focus:border-indigo-300
                              focus:ring
                              focus:ring-indigo-200
                              focus:ring-opacity-50
                              rounded-md
                              shadow-sm
                              w-full
                              mt-1
                              py-2.5
                              px-4
                              text-gray-700
                              leading-tight
                              focus:border-indigo-300
                              rounded-lg
                              dark:border-gray-200
                              dark:border-none
                              dark:bg-gray-600
                              dark:text-white
                              dark:focus:border-blue-500
                              dark:focus:shadow-outline-blue
                            "
                            v-model="form.TipoDocumento"
                            @change="MostrarRazonSocial(this.value)"
                            :class="[
                              {
                                'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                                  v$.form.TipoDocumento.$error,
                              },
                              {
                                'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400':
                                  InputForm,
                              },
                            ]"
                            :disabled="InputForm"
                          >
                            <option disabled selected value="">
                              Seleccione Tanque o Reservorio
                            </option>

                            <option
                              v-for="(tp, index) in TipoDocumento"
                              :key="index"
                              :value="tp.valor"
                            >
                              {{ tp.campo }}
                            </option>
                          </select>
                          <div
                            v-if="errors.TipoDocumento"
                            class="
                              text-xs
                              px-2
                              py-2
                              text-red-400
                              dark:text-red-400
                            "
                          >
                            {{ errors.TipoDocumento }}
                          </div>

                          <div
                            v-for="(error, index) of v$.form.TipoDocumento
                              .$errors"
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

                      <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                        <div>
                          <JetLabel
                            for="Material Aula"
                            value="Material de Aula:"
                          />

                          <select
                            class="
                              border-gray-300
                              focus:border-indigo-300
                              focus:ring
                              focus:ring-indigo-200
                              focus:ring-opacity-50
                              rounded-md
                              shadow-sm
                              w-full
                              mt-1
                              py-2.5
                              px-4
                              text-gray-700
                              leading-tight
                              focus:border-indigo-300
                              rounded-lg
                              dark:border-gray-200
                              dark:border-none
                              dark:bg-gray-600
                              dark:text-white
                              dark:focus:border-blue-500
                              dark:focus:shadow-outline-blue
                            "
                            v-model="form.TipoDocumento"
                            @change="MostrarRazonSocial(this.value)"
                            :class="[
                              {
                                'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                                  v$.form.TipoDocumento.$error,
                              },
                              {
                                'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400':
                                  InputForm,
                              },
                            ]"
                            :disabled="InputForm"
                          >
                            <option disabled selected value="">
                              Seleccione tipo de material
                            </option>

                            <option
                              v-for="(tp, index) in TipoDocumento"
                              :key="index"
                              :value="tp.valor"
                            >
                              {{ tp.campo }}
                            </option>
                          </select>
                          <div
                            v-if="errors.TipoDocumento"
                            class="
                              text-xs
                              px-2
                              py-2
                              text-red-400
                              dark:text-red-400
                            "
                          >
                            {{ errors.TipoDocumento }}
                          </div>

                          <div
                            v-for="(error, index) of v$.form.TipoDocumento
                              .$errors"
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

                      <div class="grid grid-cols-1 md:grid-cols-1 md:gap-8">
                        <div class="block mt-4">
                          <label class="flex items-center">
                            <JetCheckbox
                              type="checkbox"
                              v-model:checked="form.ConfirmarDatos"
                            />
                            <span
                              class="
                                ml-2
                                font-medium
                                text-sm text-gray-700
                                dark:text-white
                              "
                              >Confirmar si la informacion es correcta antes de
                              guardar</span
                            >
                          </label>
                          <div
                            v-for="(error, index) of v$.form.ConfirmarDatos
                              .$errors"
                            :key="index"
                          >
                            <div
                              class="
                                text-xs
                                py-2
                                px-2
                                text-red-400
                                dark:text-red-400
                              "
                            >
                              {{ error.$message }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>

                <JetButton
                  form="formGuardar"
                  class="my-3"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing || v$.form.$invalid"
                >
                  Guardar
                  {{ form.progress ? `${form.progress.percentage}% ` : "" }}
                </JetButton>
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
import JetLabel from "@/Componentes/Label.vue";
import JetInput from "@/Componentes/Input.vue";
import JetCheckbox from "@/Componentes/Checkbox.vue";
import useVuelidate from "@vuelidate/core";
import {
  required,
  email,
  minLength,
  maxLength,
  helpers,
  numeric,
  sameAs,
  requiredIf,
} from "@vuelidate/validators";

export default defineComponent({
  components: {
    Head,
    MainLayout,
    Link,
    JetButton,
    JetInput,
    JetLabel,
    JetCheckbox,
  },
  props: {
    TipoDocumento: Object,
    errors: Object,
  },

  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      buscar: "",
      VerInputRazonSocial: false,

      InputForm: false,
      InputDireccion: false,
      InputTelefono: false,
      InputEmail: false,
      VerAgregarDireccion: true,
      VerAgregarTelefono: true,
      VerAgregarEmail: true,
      VerEliminarDireccion: true,
      VerEliminarTelefono: true,
      VerEliminarEmail: true,
      form: this.$inertia.form({
        _method: "POST",
        CodigoPersona: "",
        RazonSocial: "",
        Nombres: "",
        ApellidoPaterno: "",
        ApellidoMaterno: "",
        TipoDocumento: "",
        NumeroDocumento: "",
        CodigoTrabajador: "",

        Direccion: [
          {
            DatoPersonal: "1",
            Valor: "",
          },
        ],
        Telefono: [
          {
            DatoPersonal: "2",
            Valor: "",
          },
        ],
        Email: [
          {
            DatoPersonal: "3",
            Valor: "",
          },
        ],
        UsuarioCreador: this.$page.props.user.name,
        Estado: "1",
        ConfirmarDatos: null,
      }),
      loadingTrabajador: false,
    };
  },

  validations() {
    return {
      form: {
        TipoDocumento: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),

          $autoDirty: true,
        },
        NumeroDocumento: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          numeric: helpers.withMessage(
            "Este campo solo debe contener numeros",
            numeric
          ),
          validarNumerosTipoDocumento: helpers.withMessage(
            "El número de dígitos es incorrecto",
            this.ValidarNumerosTipoDocumento
          ),
          ValidarNumerosDigitosIguales: helpers.withMessage(
            "Numero incorrecto los digitos no pueden ser iguales",
            this.ValidarNumerosDigitosIguales
          ),

          validarNumeroRuc: helpers.withMessage(
            "El número ingresado es incorrecto",
            this.ValidarNumeroRuc
          ),

          $autoDirty: true,
        },
        RazonSocial: {
          requiredIf: helpers.withMessage(
            "Este campo no puede estar vacío",
            requiredIf(() => {
              return this.form.TipoDocumento == "2";
            })
          ),
          $autoDirty: true,
        },
        Nombres: {
          requiredIf: helpers.withMessage(
            "Este campo no puede estar vacío",
            requiredIf(() => {
              return this.form.TipoDocumento != "2";
            })
          ),
          max: helpers.withMessage(
            "La longitud máxima permitida es 200",
            maxLength(200)
          ),

          $autoDirty: true,
        },
        ApellidoPaterno: {
          requiredIf: helpers.withMessage(
            "Este campo no puede estar vacío",
            requiredIf(() => {
              return this.form.TipoDocumento != "2";
            })
          ),
          max: helpers.withMessage(
            "La longitud máxima permitida es 200",
            maxLength(200)
          ),
          $autoDirty: true,
        },
        ApellidoMaterno: {
          requiredIf: helpers.withMessage(
            "Este campo no puede estar vacío",
            requiredIf(() => {
              return this.form.TipoDocumento != "2";
            })
          ),
          max: helpers.withMessage(
            "La longitud máxima permitida es 200",
            maxLength(200)
          ),
          $autoDirty: true,
        },

        Direccion: {
          $each: helpers.forEach({
            Valor: {
              required: helpers.withMessage(
                "Este campo no puede estar vacío",
                required
              ),
              max: helpers.withMessage(
                "La longitud máxima permitida es 200",
                maxLength(200)
              ),
              validarDupicidadDireccion: helpers.withMessage(
                "Las direcciones deben ser distintas",
                this.ValidarDupicidadDireccion
              ),
            },
          }),
        },

        Telefono: {
          $each: helpers.forEach({
            Valor: {
              required: helpers.withMessage(
                "Este campo no puede estar vacío",
                required
              ),
              max: helpers.withMessage(
                "La longitud máxima permitida es 9",
                maxLength(9)
              ),
              min: helpers.withMessage(
                "La longitud mínima permitida es 8",
                minLength(8)
              ),
              numeric: helpers.withMessage(
                "Este campo solo debe contener numeros",
                numeric
              ),
              validarDupicidadTelefono: helpers.withMessage(
                "Las números de telefono deben ser distintos",
                this.ValidarDupicidadTelefono
              ),
            },
          }),
        },

        Email: {
          $each: helpers.forEach({
            Valor: {
              required: helpers.withMessage(
                "Este campo no puede estar vacío",
                required
              ),
              email: helpers.withMessage(
                "El valor no es una dirección de correo electrónico válida",
                email
              ),
              max: helpers.withMessage(
                "La longitud máxima permitida es 200",
                maxLength(200)
              ),
              validarDupicidadEmail: helpers.withMessage(
                "Los correos electrónicos deben ser distintos",
                this.ValidarDupicidadEmail
              ),
            },
          }),
        },
        ConfirmarDatos: {
          sameAs: helpers.withMessage(
            "Confirme si la informacion correcta",
            sameAs(true)
          ),
          $autoDirty: true,
        },
      },
    };
  },

  methods: {
    async BuscarTrabajador() {
      if (this.form.NumeroDocumento != "") {
        this.loadingTrabajador = true;
        await axios
          .get("/buscartrabajador/" + this.form.NumeroDocumento)
          .then((response) => {
            let trabajador = "";

            trabajador = response.data;

            // console.log(Object.keys(response.data).length);

            if (Object.keys(response.data).length > 0) {
              this.ContadorDireccionTrabajador = 0;
              this.ContadorTelefonotTabajador = 0;
              this.ContadorEmailTrabajador = 0;

              if (trabajador.razon_social != "") {
                this.VerInputRazonSocial = true;
              }
              this.form.CodigoPersona = trabajador.id;
              this.form.RazonSocial = trabajador.razon_social;
              this.form.Nombres = trabajador.nombres;
              this.form.ApellidoPaterno = trabajador.apellido_paterno;
              this.form.ApellidoMaterno = trabajador.apellido_materno;
              this.form.TipoDocumento = trabajador.tipo_documento;

              this.InputForm = true;

              if (trabajador.datopersonas != null) {
                this.form.Direccion = [];
                this.form.Telefono = [];
                this.form.Email = [];

                for (let valor of trabajador.datopersonas) {
                  if (valor.dato_personal === 1 && valor.valor != "") {
                    if (this.ContadorDireccionTrabajador == 0) {
                      this.form.Direccion.splice(0, 1);
                    }
                    this.form.Direccion.push({
                      DatoPersonal: valor.dato_personal,
                      Valor: valor.valor,
                    });
                    this.ContadorDireccionTrabajador = +1;
                    this.InputDireccion = true;
                    this.VerAgregarDireccion = false;
                    this.VerEliminarDireccion = false;
                  }
                  if (valor.dato_personal === 2 && valor.valor != "") {
                    if (this.ContadorTelefonoTrabajador == 0) {
                      this.form.Telefono.splice(0, 1);
                    }
                    this.form.Telefono.push({
                      DatoPersonal: valor.dato_personal,
                      Valor: valor.valor,
                    });
                    this.ContadorTelefonoTrabajador = +1;
                    this.InputTelefono = true;
                    this.VerAgregarTelefono = false;
                    this.VerEliminarTelefono = false;
                  }
                  if (valor.dato_personal === 3 && valor.valor != "") {
                    this.form.Email.push({
                      DatoPersonal: valor.dato_personal,
                      Valor: valor.valor,
                    });
                    this.ContadorEmail = +1;
                    this.InputEmail = true;
                    this.VerAgregarEmail = false;
                    this.VerEliminarEmail = false;
                  }
                }
              }
            } else {
              //limpiar inputs
              let NumeroAuxiliar = this.form.NumeroDocumento;
              this.form.reset();

              this.form.NumeroDocumento = NumeroAuxiliar;
              //direccion

              this.InputDireccion = false;
              this.VerAgregarDireccion = true;
              this.VerEliminarDireccion = true;

              //telefono

              this.InputTelefono = false;
              this.VerAgregarTelefono = true;
              this.VerEliminarTelefono = true;
              //email

              this.InputEmail = false;
              this.VerAgregarEmail = true;
              this.VerEliminarEmail = true;
              // input razon social
              this.VerInputRazonSocial = false;
              this.InputForm = false;
            }
          })
          .catch((err) => {
            console.log(err);
          })
          .finally(() => (this.loadingTrabajador = false));
      }
    },

    //validaciones personalizadas
    ValidarNumerosTipoDocumento() {
      if (
        (this.form.TipoDocumento == "1" &&
          this.form.NumeroDocumento.length == 8) ||
        (this.form.TipoDocumento == "2" &&
          this.form.NumeroDocumento.length == 11) ||
        (this.form.TipoDocumento == "3" &&
          this.form.NumeroDocumento.length == 12) ||
        (this.form.TipoDocumento == "4" &&
          this.form.NumeroDocumento.length == 12) ||
        (this.form.TipoDocumento == "5" &&
          this.form.NumeroDocumento.length == 15)
      ) {
        return true;
      } else {
        return false;
      }
    },
    ValidarNumerosDigitosIguales() {
      if (
        (this.form.TipoDocumento == "1" &&
          this.form.NumeroDocumento != "11111111" &&
          this.form.NumeroDocumento != "22222222" &&
          this.form.NumeroDocumento != "33333333" &&
          this.form.NumeroDocumento != "44444444" &&
          this.form.NumeroDocumento != "55555555" &&
          this.form.NumeroDocumento != "66666666" &&
          this.form.NumeroDocumento != "77777777" &&
          this.form.NumeroDocumento != "88888888" &&
          this.form.NumeroDocumento != "99999999") ||
        (this.form.TipoDocumento == "2" &&
          this.form.NumeroDocumento != "11111111111" &&
          this.form.NumeroDocumento != "22222222222" &&
          this.form.NumeroDocumento != "33333333333" &&
          this.form.NumeroDocumento != "44444444444" &&
          this.form.NumeroDocumento != "55555555555" &&
          this.form.NumeroDocumento != "66666666666" &&
          this.form.NumeroDocumento != "77777777777" &&
          this.form.NumeroDocumento != "88888888888" &&
          this.form.NumeroDocumento != "99999999999") ||
        (this.form.TipoDocumento == "3" &&
          this.form.NumeroDocumento != "111111111111" &&
          this.form.NumeroDocumento != "222222222222" &&
          this.form.NumeroDocumento != "333333333333" &&
          this.form.NumeroDocumento != "444444444444" &&
          this.form.NumeroDocumento != "555555555555" &&
          this.form.NumeroDocumento != "666666666666" &&
          this.form.NumeroDocumento != "777777777777" &&
          this.form.NumeroDocumento != "888888888888" &&
          this.form.NumeroDocumento != "999999999999") ||
        (this.form.TipoDocumento == "4" &&
          this.form.NumeroDocumento != "111111111111" &&
          this.form.NumeroDocumento != "222222222222" &&
          this.form.NumeroDocumento != "333333333333" &&
          this.form.NumeroDocumento != "444444444444" &&
          this.form.NumeroDocumento != "555555555555" &&
          this.form.NumeroDocumento != "666666666666" &&
          this.form.NumeroDocumento != "777777777777" &&
          this.form.NumeroDocumento != "888888888888" &&
          this.form.NumeroDocumento != "999999999999") ||
        (this.form.TipoDocumento == "5" &&
          this.form.NumeroDocumento.length == 15)
      ) {
        return true;
      } else {
        return false;
      }
    },
    ValidarNumeroRuc() {
      if (
        (this.form.TipoDocumento == "2" &&
          this.form.NumeroDocumento.charAt(0) == "2") ||
        (this.form.TipoDocumento == "2" &&
          this.form.NumeroDocumento.charAt(0) == "1") ||
        (this.form.TipoDocumento != "2" &&
          this.form.NumeroDocumento.charAt(0) != "1") ||
        (this.form.TipoDocumento != "2" &&
          this.form.NumeroDocumento.charAt(0) != 2)
      ) {
        return true;
      } else {
        return false;
      }
    },
    ValidarDupicidadDireccion() {
      const ids = this.form.Direccion.map((o) => o.Valor);
      const filtered = this.form.Direccion.filter(({ Valor }, index) =>
        ids.includes(Valor, index + 1)
      );
      if (filtered.length < 1) {
        return true;
      } else {
        return false;
      }
    },
    ValidarDupicidadTelefono() {
      const ids = this.form.Telefono.map((o) => o.Valor);
      const filtered = this.form.Telefono.filter(({ Valor }, index) =>
        ids.includes(Valor, index + 1)
      );
      if (filtered.length < 1) {
        return true;
      } else {
        return false;
      }
    },
    ValidarDupicidadEmail() {
      const ids = this.form.Email.map((o) => o.Valor);
      const filtered = this.form.Email.filter(({ Valor }, index) =>
        ids.includes(Valor, index + 1)
      );
      if (filtered.length < 1) {
        return true;
      } else {
        return false;
      }
    },
    /*BuscarTrabajador() {
          this.$inertia.get(
            route("trabajador.create"),
            {
              buscar: this.form.NumeroDocumento,
            },
            {
              preserveState: false,
            }
          );
        },*/
    //validar numeros
    SoloNumeros($event) {
      if (
        $event.charCode === 0 ||
        /\d/.test(String.fromCharCode($event.charCode))
      ) {
        return true;
      } else {
        $event.preventDefault();
      }
    },
    //validar letras
    SoloLetras($event) {
      var reg_name_lastname = /^[a-zA-ZñÑ\s]*$/;

      if (reg_name_lastname.test(String.fromCharCode($event.charCode))) {
        return true;
      } else {
        $event.preventDefault();
      }
    },
    //focus en el input Numero documento
    FocusInputNumeroDocumento() {
      this.$refs.NumeroDocumento.focus();
    },
    //metodos de input direccion
    AgregarDireccion(index) {
      if (index < 4) {
        this.form.Direccion.push({ DatoPersonal: "1", Valor: "" });
      }
      if (index == 3) {
        this.VerAgregarDireccion = false;
      }
    },
    EliminarDireccion(index) {
      this.form.Direccion.splice(index, 1);
      this.VerAgregarDireccion = true;
    },
    //metodos de input telefono
    AgregarTelefono(index) {
      if (index < 4) {
        this.form.Telefono.push({ DatoPersonal: "2", Valor: "" });
      }
      if (index == 3) {
        this.VerAgregarTelefono = false;
      }
    },
    EliminarTelefono(index) {
      this.form.Telefono.splice(index, 1);
      this.VerAgregarTelefono = true;
    },
    //metodos de input email
    AgregarEmail(index) {
      if (index < 4) {
        this.form.Email.push({ DatoPersonal: "3", Valor: "" });
      }
      if (index == 3) {
        this.VerAgregarEmail = false;
      }
    },
    EliminarEmail(index) {
      this.form.Email.splice(index, 1);
      this.VerAgregarEmail = true;
    },
    //metodos de input Razon social
    MostrarRazonSocial(event) {
      if (this.form.TipoDocumento == "2") {
        this.VerInputRazonSocial = true;

        this.form.Nombres = "";
        this.form.ApellidoPaterno = "";
        this.form.ApellidoMaterno = "";
      } else {
        this.VerInputRazonSocial = false;
        this.form.RazonSocial = "";
      }
    },

    //metodos de guardar datos
    /*
        GuardarInfraestrutura() {
          this.form.post(
            this.route("trabajador.store"),
    
            {
              onSuccess: () => {
                this.form.reset();
                this.$notify(
                  {
                    group: "mensajes",
                    type: "success",
                    title: "Exíto",
                    text: "Tabajador registrado correctamente",
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
                    text: "Trabajador no registrado",
                  },
                  2000
                );
              },
            }
          );
        },*/
  },
});
</script>
