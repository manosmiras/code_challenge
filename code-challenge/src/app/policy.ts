// Policy class to define this object's properties.
export class Policy {
    constructor(
        public id: number,
        public customer_name: string,
        public customer_address: string,
        public premium: number,
        public policy_type: string,
        public insurer_name: string
    ){}
}