<template>
	<div class="table-responsive">
		<div class="container">
			<div class="input-group">
				<input @input="fetchStudent(url_def + '?' + filter)" v-model="search" style="text-align:center" type="text" class="form-control" />
			</div>
		</div>
		<table class="align-middle mb-0 table table-borderless table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">City</th>
					<th></th>
					<th class="text-center">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="student in students.data" v-bind:key="student.id">
					<td>
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left mr-3">
									<div class="widget-content-left"></div>
								</div>
								<div class="widget-content-left flex2">
									<div class="widget-heading">{{ student.name }}</div>

                                    <nested-component></nested-component>

									<div class="widget-subheading opacity-7">
										Intake:
										<b>{{ student.intake }}</b>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td class="text-center">{{ student.city }}</td>
					<td class="text-center">
						<div
							:id="'student'+student.id"
							@click="updateStatus(student.id)"
							v-if="student.status == 0"
							class="btn btn-sm btn-outline-info"
						>Wisuda</div>
					</td>
					<td class="text-center">
						<div v-if="student.status == 1" class="btn btn-sm badge badge-success text-white">
							<b>Lulus</b>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="d-block text-center card-footer">
			<button
				@click="fetchStudent(students.prev_page_url + '&' + filter)"
				class="mr-2 btn-icon btn-icon-only btn btn-outline-primary"
				:disabled="disablePrev"
			>Prev</button>
			<button
				@click="fetchStudent(students.next_page_url + '&' + filter)"
				class="mr-2 btn-icon btn-icon-only btn btn-outline-primary"
				:disabled="disableNext"
			>Next</button>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
            students: [],
            search: "",
            url_def: "/api/overview"
		};
	},
	created() {
		this.fetchStudent(this.url_def);
	},
	methods: {
		fetchStudent(url) {
			axios.get(url).then(response => {
				this.students = response.data;
			});
		},
		updateStatus(id) {
			$("#student" + id).hide();
			axios
				.post("/api/update/status/" + id)
				.then(response => {
					this.fetchStudent(
						this.students.path + "?page=" + this.students.current_page + '&' + this.filter
					);
				})
				.catch(error => {
					$("#student" + id).show();
					$("#student" + id)
						.removeClass("btn-outline-info")
						.addClass("btn-outline-danger");
					$("#student" + id).html("Error");
					setTimeout(function() {
						$("#student" + id)
							.removeClass("btn-outline-danger")
							.addClass("btn-outline-info");
						$("#student" + id).html("Wisuda");
					}, 1000);
				});
		}
	},
	computed: {
		disablePrev() {
			let status = false;
			if (this.students.prev_page_url == null) {
				status = true;
			}
			return status;
		},
		disableNext() {
			let status = false;
			if (this.students.next_page_url == null) {
				status = true;
			}
			return status;
        },
        filter(){
            let filters = "search="+this.search;
            return filters;
        }
	}
};
</script>
