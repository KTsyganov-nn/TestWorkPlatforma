<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, router, useForm} from '@inertiajs/vue3';


const props = defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    task: Object,
    auth: Object
});


</script>

<template>
    <AppLayout title="Просмотр задачи">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Просмотр задачи
            </h2>

        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-10 py-5 border-b border-gray-200">
                        {{ task.data.title }}
                    </div>
                    <div class="px-10 py-5 border-b border-gray-200">
                        <div class="pb-3 font-bold">Описание</div>
                        <div>{{ task.data.description }}</div>

                    </div>
                    <div class="px-10 py-5 border-b border-gray-200">
                        <div class="pb-3 font-bold">Автор</div>
                        <div>{{ task.data.user_info.name }}</div>
                    </div>
                    <div class="px-10 py-5 border-b border-gray-200">
                        <div class="pb-3 font-bold">Статус</div>
                        <div>{{ task.data.status_title.title }}</div>
                    </div>
                    <div class="px-10 py-5 border-b border-gray-200">
                        <div class="pb-3 font-bold">Сроки выполнения</div>
                        <div>c {{ task.data.date_start }} до {{ task.data.date_end }}</div>
                    </div>
                    <div v-if="task.data.user_took_id != null" class="px-10 py-5 border-b border-gray-200">
                        <div class="pb-3 font-bold">Назначена на</div>
                        <div>{{ task.data.user_took_info.name }}</div>
                    </div>
                    <div class="px-10 py-5 border-b border-gray-200">
                        <div>
                            <Link :href="route('task.index')"
                                  class="mx-2 bg-gray-500 text-white px-10 py-2 rounded-lg"
                            >
                                Назад
                            </Link>
                            <Link
                                v-if="task.data.status_id == 1 ||(task.data.status_id == 4 && task.data.user_took_id ==auth.user.id)"
                                :href="route('task.getTask', task.data.id)"
                                class="mx-2 bg-red-950 text-white px-10 py-2 rounded-lg"
                            >Взять в работу
                            </Link>
                            <Link
                                v-if="task.data.status_id == 2 &&task.data.user_took_id == auth.user.id"
                                :href="route('task.cancelTask', task.data.id)"
                                class="mx-2 bg-red-500 text-white px-10 py-2 rounded-lg"
                            >Отказаться от выполнения
                            </Link>
                            <Link
                                v-if="task.data.status_id == 2 &&task.data.user_took_id ==auth.user.id"
                                :href="route('task.successTask', task.data.id)"
                                class="mx-2 bg-green-800 text-white px-10 py-2 rounded-lg"
                            >Выполнить
                            </Link>

                            <Link
                                v-if="task.data.user_id == auth.user.id && task.data.status_id != 2"
                                :href="route('task.edit', task.data.id)"
                                class="mx-2 bg-green-500 text-white px-10 py-2 rounded-lg"
                            >Редактировать
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
