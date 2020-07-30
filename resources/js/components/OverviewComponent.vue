<template>
	<div class="table-responsive">
		<table class="align-middle mb-0 table table-borderless table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">Name</th>
					<th class="text-center">City</th>
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
						<div v-if="student.status == 1" class="badge badge-success">Lulus</div>
					</td>
					<td class="text-center">
						<button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="d-block text-center card-footer">
			<button @click="fetchStudent(students.prev_page_url)" class="mr-2 btn-icon btn-icon-only btn btn-outline-primary" :disabled="disablePrev">Prev</button>
			<button @click="fetchStudent(students.next_page_url)" class="mr-2 btn-icon btn-icon-only btn btn-outline-primary" :disabled="disableNext">Next</button>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			students: []
		};
	},
	created() {
		this.fetchStudent("/api/overview");
	},
	methods: {
		fetchStudent(url) {
			axios.get(url).then(response => {
				this.students = response.data;
			});
		}
    },
    computed: {
		disablePrev() {
            let status = false;
            if(this.students.prev_page_url == null){
                status = true;
            }
            return status;
        },
        disableNext() {
            let status = false;
            if(this.students.next_page_url == null){
                status = true;
            }
            return status;
		}
	}
};
</script>
