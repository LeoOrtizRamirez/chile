<template>
    <AppLayout title="Contratos">
        <template #header>
            <Busqueda_Rapida></Busqueda_Rapida>
        </template>
        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
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
                                Portal
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Entidad
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Objeto
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Cuantía
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Modalidad
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Número
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Estado
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                F.Publicación
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Ubicación
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Contratista
                            </th>
                            <th
                                class="border border-white text-left py-1 px-4 uppercase font-semibold text-sm"
                            >
                                Actividad económica
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr v-for="contrato in contratos" :key="contrato.id">
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                <div class="flex items-center justify-center">
                                    <div class="mx-auto w-full max-w-[550px]">
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/pdf.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/enviar.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/estrella-verde.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/ojo-azul.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="-mx-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/compartir.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <button class="mb-3">
                                                    <img
                                                        class="icons"
                                                        src="img/svg/papelera.svg"
                                                        alt=""
                                                        width="30"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.fuente.alias_portal }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.entidad_contratante }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.objeto.substr(0, 30) }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.random }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.modalidad }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.codigo_proceso }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.estado_proceso }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.fecha_publicacion }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            >
                                {{ contrato.ubicacion }}
                            </td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            ></td>
                            <td
                                class="border border-gray-200 text-left py-3 px-4"
                            ></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Busqueda_Rapida from "@/components/Busqueda_Rapida.vue";
</script>

<script>
export default {
    props: {
        contratos: [],
    },
};
</script>

<style lang="scss" scoped>
.bg-licitaciones {
    background-color: #00a1c9;
}
</style>
