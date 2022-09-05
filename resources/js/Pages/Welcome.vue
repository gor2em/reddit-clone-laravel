<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";

defineProps({
    communities: Object,
    posts: Object,
});
</script>

<template>
    <guest-layout>
        <section class="m-2 p-2 flex md:flex-row">
            <div class="w-8/12">
                <PostCard
                    v-for="post in posts.data"
                    :post="post"
                    :community="post.community_slug"
                    :key="post.id"
                />
            </div>
            <div class="w-4/12 p-4">
                <div class="m-2 p-2 text-dark">
                    <CommunityList :communities="communities.data">
                        <template #title>Top Communities</template>
                    </CommunityList>
                </div>
            </div>
        </section>
    </guest-layout>
</template>
