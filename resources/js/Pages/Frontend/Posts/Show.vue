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
                    <div class="flex justify-between md:flex-row">
                        <div>
                            Posted by
                            <span class="text-sm ml-1 text-slate-700">{{
                                post.data.username
                            }}</span>
                        </div>
                        <div>
                            <Link class="font-semibold text-blue-400 hover:text-blue-700"
                                :href=" 
                                    route('communities.posts.edit', [
                                        community.slug,
                                        post.data.slug,
                                    ])
                                "
                            >Edit</Link>
                                                        <Link class="fonto-semibold text-red-400 hover:text-red-700 ml-2"
                                :href="
                                    route('communities.posts.edit', [
                                        community.slug,
                                        post.data.slug,
                                    ])
                                "
                            >Delete</Link>
                        </div>
                    </div>
                    <h1 class="font-semibold text-3xl text-black">
                        {{ post.data.title }}
                    </h1>
                    <p class="text-sm text-slate-700">
                        {{ post.data.description }}
                    </p>
                    <a
                        :href="post.url"
                        class="font-semibold text-blue-500 hover:text-blue-300 text-sm"
                        >{{ post.data.url }}</a
                    >
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
