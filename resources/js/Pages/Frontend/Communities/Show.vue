<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/Guest.vue";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";

defineProps({
    community: Object,
    posts: Object,
    communities: Object,
});
</script>

<template>
    <guest-layout>
        <template #header>
            <div class="flex justify-between items-center m-2 p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    r/{{ community.name }}
                </h2>
                <Link
                    v-if="$page.props.auth.auth_check"
                    :href="route('communities.posts.create', community.slug)"
                    class="px-3 py-2 rounded bg-indigo-500 text-white hover:bg-indigo-300"
                    >Create Post</Link
                >
            </div>
        </template>
        <section class="m-2 p-2 flex md:flex-row">
            <div class="w-8/12">
                <PostCard
                    v-for="post in posts.data"
                    :post="post"
                    :community="community.name"
                    :key="post.id"
                />
                <div class="mt-4 p-2">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>
            <div class="w-4/12 p-4">
                <div class="m-2 p-2">
                    <div class="bg-white">
                        <h2
                            class="font-semibold text-lg p-2 bg-indigo-700 text-white"
                        >
                            About
                            <span class="italic font-thin">{{
                                community.name
                            }}</span>
                        </h2>
                        <p class="bg-white text-dark p-4">
                            {{ community.description }}
                        </p>
                    </div>
                    <CommunityList :communities="communities.data" class="mt-4">
                        <template #title>Latest Communities</template>
                    </CommunityList>
                </div>
            </div>
        </section>
    </guest-layout>
</template>
