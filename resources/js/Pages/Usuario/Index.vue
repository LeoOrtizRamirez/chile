<template>
    <AppLayout title="Usuarios">
        <template #header>
            <link
                rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
            />
        </template>
        <!-- <pre>{{ usuarios }} </pre> -->
        <div class="contenedor w-full mt-6">
            <ContenedorOpciones
                class="contenedor-opciones"
            ></ContenedorOpciones>
            <div class="tabla bg-white overflow-auto">
                <div class="usuarios">
                    <div class="contenedor-botones">
                        <div>
                            <a
                                class="autorenew"
                                href="javascript:location.reload()"
                            >
                                <span class="material-symbols-outlined">
                                    autorenew
                                </span>
                            </a>
                            <a
                                :href="route('usuarios.create')"
                                class="add_circle"
                            >
                                <span
                                    class="material-symbols-outlined material-symbols-outlined-color"
                                >
                                    add_circle
                                </span>
                            </a>
                        </div>
                    </div>
                    <div>Usuarios</div>
                    <div></div>
                </div>
                <div class="overflow-scroll">
                    <table class="table w-full bg-white border border-indigo-600">
                        <thead class="">
                            <tr
                                class="bg-licitaciones text-white uppercase text-sm leading-normal"
                            >
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Acciones
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Nombre Completo
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Documento de <br />identidad
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Celular
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    indicativo
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    teléfono fijo
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Dirección
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Ciudad
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    País
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Plan
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Email
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Email confirmado
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Fecha de <br />creacion
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Fecha Final Plan
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Estado
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Como se entero <br />de Licitaciones
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Nombre de la<br />empresa
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    NIT
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    País
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Email confirmado
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Ciudad Empresa
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Dirección
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Celular empresa
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Indicativo
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Telefono fijo
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Email de <br />facturación de la<br />empresa
                                </th>
                                <th
                                    class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                                >
                                    Descripción de la <br />actividad<br />economica
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr v-for="usuario in usuarios.data" :key="usuario.id">
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <div class="div-icons">
                                        <a @click="destroy(usuario)" href="#">
                                            <span
                                                class="delete material-symbols-outlined"
                                            >
                                                delete
                                            </span>
                                        </a>
                                    </div>

                                    <div class="div-icons">
                                        <a :href="route('usuarios.edit', usuario)"
                                            ><span
                                                class="edit material-symbols-outlined"
                                            >
                                                edit
                                            </span>
                                        </a>
                                    </div>

                                    <div class="div-icons">
                                        <a href="#">
                                            <span
                                                class="mail material-symbols-outlined"
                                            >
                                                mail
                                            </span>
                                        </a>
                                    </div>
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    {{ usuario.nombre_completo }}
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- DOCUMENTO DE IDENTIDAD -->
                                    {{ usuario.identificacion }}
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- CELULAR -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- INDICATIVO -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- TELÉFONO FIJO	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- DIRECCIÓN -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- CIUDAD -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- PAÍS -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- PLAN -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- EMAIL -->
                                    {{ usuario.email }}
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- EMAIL CONFIRMADO	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- FECHA DE CREACION	 -->
                                    {{ usuario.created_at }}
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- FECHA FINAL PLAN	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!--  Estado -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- Como se entero de Licitaciones -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- NOMBRE DE LA EMPRESA -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- NIT -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- PAÍS -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- EMAIL CONFIRMADO -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- CIUDAD EMPRESA	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- DIRECCIÓN -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- CELULAR EMPRESA	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- INDICATIVO  -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- TELEFONO FIJO	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- EMAIL DE FACTURACIÓN DE LA EMPRESA	 -->
                                </td>
                                <td
                                    class="border border-gray-200 text-left py-3 px-4"
                                >
                                    <!-- DESCRIPCIÓN DE LA ACTIVIDADECONOMICA	 -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <pagination :pagination="usuarios"></pagination>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/components/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue3";
import ContenedorOpciones from "../../Components/ContenedorOpciones.vue";

export default {
    components: {
        AppLayout,
        Pagination,
        Link,
        ContenedorOpciones,
    },

    props: {
        usuarios: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(this.route("usuarios.destroy", id));
        },
    },
};
</script>

<style lang="scss" scoped>
.bg-licitaciones {
    background-color: #e6e6e6;
}

.material-symbols-outlined-star {
    color: #00a1c9;
}

.contenedor {
    display: flex;
    flex-direction: row;
}

.contenedor-opciones {
    display: flex;
    flex-direction: column;
    // border: solid 2px red;
    margin-right: 25px;
    margin-left: 10px;
}

.contenedor-botones {
    display: flex;
    flex-direction: row;
}

.autorenew {
    background-color: #ffffff;
    width: 35px;
    height: 35px;
    border-bottom: solid 1px #b5b5b5;
    margin-bottom: 5px;
    margin-right: 5px;
    text-align: center;
    padding: 5px;
    color: black;
}

.add_circle {
    background-color: #00a1c9;
    width: 35px;
    height: 35px;
    border-bottom: solid 1px #b5b5b5;
    margin-bottom: 5px;
    text-align: center;
    padding: 5px;
}

.material-symbols-outlined-color {
    color: white;
}

.div-icons {
    display: flex;
    justify-content: center;
}

.delete {
    color: red;
}

.edit {
    color: #00a1c9;
}

.mail {
    color: grey;
}

th {
    color: black;
}

.usuarios {
    padding: 5px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    text-align: center;
    color: #00a1c9;
    font-weight: bold;
    font-size: 22px;
    background-color: #e6e6e6;
    justify-content: space-between;
}
</style>
