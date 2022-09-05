<script setup>
import { Link, useForm } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/Guest.vue";
import PostVote from "@/Components/PostVote.vue";

const props = defineProps({
    community: Object,
    post: Object,
});

const form = useForm({
    content: "",
});

const submit = () => {
    form.post(
        route("frontend.posts.comments", [
            props.community.slug,
            props.post.data.slug,
        ]),
        {
            onSuccess: () => form.reset("content"),
        }
    );
};
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
                <div class="flex m-2 p-2 text-sm text-slate-400 bg-white">
                    <div>
                        <PostVote :post="post.data"/>
                    </div>
                    <div class="w-full">
                        <div
                            class="flex flex-col justify-between md:flex-row m-2"
                        >
                            <div>
                                Posted by
                                <span class="text-sm ml-1 text-slate-700">{{
                                    post.data.username
                                }}</span>
                            </div>
                            <div
                                v-if="
                                    $page.props.auth.auth_check &&
                                    post.data.owner
                                "
                            >
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
                        <hr />
                        <div v-if="$page.props.auth.auth_check">
                            <form
                                class="m-2 p-2 max-w-md"
                                @submit.prevent="submit"
                            >
                                <div class="mt-2">
                                    <label
                                        for="comment"
                                        class="block mb-2 text-sm font-medium text-gray-900"
                                        >Your Comment</label
                                    >
                                    <textarea
                                        v-model="form.content"
                                        id="comment"
                                        rows="4"
                                        class="bolck p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-400"
                                    ></textarea>
                                </div>
                                <div class="mt-2">
                                    <button
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md"
                                    >
                                        Comment
                                    </button>
                                </div>
                            </form>
                        </div>
                        <hr />
                        <div>
                            <ul
                                role="list"
                                class="divide-y divide-gray-200 m-2 p-2"
                            >
                                <li
                                    class="py-4 flex flex-col"
                                    v-for="(comment, index) in post.data
                                        .comments"
                                    :key="index"
                                >
                                    <div class="text-sm">
                                        Commented by<span
                                            class="font-semibold ml-1 text-black"
                                            >{{ comment.username }}</span
                                        >
                                    </div>
                                    <div>{{ comment.content }}</div>
                                </li>
                            </ul>
                        </div>
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
