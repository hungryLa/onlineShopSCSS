import { toTypedSchema } from '@vee-validate/zod'
import * as z from 'zod'
import {useI18n} from "vue-i18n";

// const ii18n = useI18n()
export const authSchema = toTypedSchema(z.object({
    email: z.string().email().min(2).max(50),
    password: z.string().min(8).max(50),
}))
