<template>
    <form action="/posts/create" method="post" enctype="multipart/form-data" class="post-form">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div class="form-header">
            <div class="form-background-img"></div>
            <div class="file-area">
                <div v-if="url" class="upload-file">
                    <img :src="url">
                </div>
                <div v-else class="upload-file">
                    <div><span>NO IMAGE</span></div>
                </div>
            </div>
            <div class="upload-btn-area">
                <input type="file" name="file" accept="image/*" ref="preview" v-on:change="fileSelected" class="upload-btn">
            </div>
        </div>
        <div class="form-body">
            <div class="form-group">
                <div class="post-purchase-date">
                    <label class="post-form-label">購入日</label>
                    <input type="date" name="purchase_date" v-model="purchase_date">
                </div>
            </div>
            <div class="form-group">
                <div class="post-title">
                    <label class="post-form-label">ブランド名</label>
                    <input type="text" name="title" v-model="title">
                </div>
                <strong class="error" v-for="value in errors.title">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-details">
                    <label class="post-form-label">詳細情報</label>
                    <textarea name="details" maxlength="500" v-model="details"></textarea>
                </div>
                <strong class="error" v-for="value in errors.details">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-maintenance">
                    <label class="post-form-label">メンテナンス内容</label>
                    <textarea name="maintenance" maxlength="1000" v-model="maintenance"></textarea>
                </div>
                <strong class="error" v-for="value in errors.maintenance">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="post-remarks">
                    <label class="post-form-label">備考</label>
                    <textarea name="remarks" maxlength="1000" v-model="remarks"></textarea>
                </div>
                <strong class="error" v-for="value in errors.remarks">{{ value }}</strong>
            </div>
            <div class="form-group">
                <div class="submit-btn">
                    <input type="submit" value="SEND">
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                url: "",
                purchase_date: this.old.purchase_date,
                title: this.old.title,
                details: this.old.details,
                maintenance: this.old.maintenance,
                remarks: this.old.remarks,
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
            },
            old: Array,
            errors: Array,
        },
    }
</script>