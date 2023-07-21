let editProjectModal = document.getElementById('js-project-modal');

export default() => ({
    openModal() {
        editProjectModal.showModal();
    },

    project: {},

    async getProject() {
        let res = await (await fetch('/api/project/2')).json();
        this.project = res.data;
        console.log(this.project);
    },
})