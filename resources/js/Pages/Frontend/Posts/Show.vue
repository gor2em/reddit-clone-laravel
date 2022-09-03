<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/Guest.vue";

defineProps({
    community: Object,
    post: Object,
});
</script>

<template>
    <guest-layout>
        <section class="flex flex-col md:flex-row m-2 p-2">
            <div class="w-full md:w-8/12">
                <div class="m-2 p-2 bg-white">
                    <h2
                        class="font-semibold tex-2xl text-black hover:text-indigo-600"
                    >
                        <Link
                            :href="
                                route(
                                    'frontend.communities.show',
                                    community.slug
                                )
                            "
                        >
                            r/{{ community.name }}
                        </Link>
                    </h2>
                </div>
                <div class="m-2 p-2 text-sm text-slate-400 bg-white">
                    <div class="flex flex-col justify-between md:flex-row m-2">
                        <div>
                            Posted by
                            <span class="text-sm ml-1 text-slate-700">{{
                                post.data.username
                            }}</span>
                        </div>
                        <div v-if="$page.props.auth.auth_check && post.data.owner">
                            <Link
                                class="font-semibold bg-blue-500 text-white px-4 hover:bg-blue-700 rounded"
                                :href="
                                    route('communities.posts.edit', [
                                        community.slug,
                                        post.data.slug,
                                    ])
                                "
                                >Edit</Link
                            >
                            <Link
                                class="fonto-semibold bg-red-500 text-white px-4 hover:bg-red-700 rounded ml-2"
                                :href="
                                    route('communities.posts.destroy', [
                                        community.slug,
                                        post.data.slug,
                                    ])
                                "
                                method="delete"
                                as="button"
                                type="button"
                                >Delete</Link
                            >
                        </div>
                    </div>
                    <div class="p-2">
                        <h1 class="font-semibold text-3xl text-black">
                            {{ post.data.title }}
                        </h1>
                        <p class="text-sm text-slate-700 my-2">
                            {{ post.data.description }}
                        </p>
                        <a
                            :href="post.url"
                            class="font-semibold text-blue-500 hover:text-blue-300 text-sm"
                            >{{ post.data.url }}</a
                        >
                    </div>
                </div>
            </div>
            <div class="w-full md:w-4/12">
                <div class="bg-slate-600 text-white">
                    <h2>Latest Communities</h2>
                </div>
            </div>
        </section>
    </guest-layout>
</template>
