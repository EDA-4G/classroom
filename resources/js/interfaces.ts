export interface IAdvertisement {
    id: number;
    description: string;
    image: string;
    is_active: boolean;
    created_at: Date;
}

export interface IDepartment {
    id: number;
    description: string;
    is_active: boolean;
    created_at?: Date;
}

enum ClassroomStatus {
    Open = 'open',
    In_class = 'in_class',
    In_room = 'in_room',
    Test = 'test',
    Exam = 'open',
    Unlock = 'in_class',
    Maintenance = 'in_room',
    None = 'test',
}

export interface IClassroom {
    id: number;
    description: string;
    image: string;
    level: string;
    status: string;
    is_fixed: boolean;
    is_active: boolean;
    created_at?: Date;
}
