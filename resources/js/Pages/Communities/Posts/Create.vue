<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/Label.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    community: Object,
    errors: Object,
});

const form = useForm({
    title: "",
    description: "",
    url: "",
});

const submit = () => {
    form.post(route("communities.posts.store", props.community.slug));
};
</script>

<template>
    <Head title="Create Post" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post for {{ community.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="title" value="Title" />
                                <BreezeInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    autofocus
                                    autocomplete="title"
                                />
                                <!-- <BreezeInputError :message="ferrors.name" /> -->
                                <BreezeInputError
                                    class="mt-2"
                                    :message="errors.title"
                                />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel
                                    for="description"
                                    value="Description"
                                />
                                <BreezeInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    autocomplete="description"
                                />
                                <BreezeInputError
                                    class="mt-2"
                                    :message="errors.description"
                                />
                            </div>

                            <div class="mt-4">
                                <BreezeLabel for="url" value="Url" />
                                <BreezeInput
                                    id="url"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.url"
                                    autocomplete="url"
                                />
                                <BreezeInputError
                                    class="mt-2"
                                    :message="errors.url"
                                />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <!-- <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        Already registered?
                    </Link> -->

                                <BreezeButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Store
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
