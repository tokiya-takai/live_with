<template>
    <form action="/posts/edit" method="post" enctype="multipart/form-data" class="edit-post-form">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div class="form-header">
            <div class="file-area">
                <div v-if="url" class="upload-file">
                    <img :src="url">
                </div>
                <div v-else class="upload-file">
                    <div><span>NO IMAGE</span></div>
                </div>
            </div>
            <input type="file" name="file" accept="image/*" ref="preview" v-on:change="fileSelected" class="upload-btn">
        </div>
        <div class="form-body">
            <div class="new-post-title">
                <input type="text" name="title" placeholder="Brand name, title, etc." maxlength="30">
            </div>
            <div class="new-post-content">
                <textarea name="content" placeholder="Details" maxlength="1000"></textarea>
            </div>
        </div>
        <div class="submit-btn">
            <input type="submit" value="SEND">
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                url:""
            }
        },
        methods:{
            fileSelected(){
                const file = this.$refs.preview.files[0];
                this.url = URL.createObjectURL(file)
            }
        },
        props:  {
            csrf: {
                type: String,
                required: true,
            }
        },
    }
</script>