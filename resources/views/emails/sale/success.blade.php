@component('mail::message')
@if ($program->language == 'en')
# IZ Online Education Enrollment Confirmation

Dear {{ $user->first_name }},

# Welcome to IZ Online Education
The best online platform education in Egypt taught by the best professional and experienced instructors with an official certification from Barcelona Innovation Hub.

We’re happy to have you join us for this exciting session of IZ Online Education with Barça innovation hub- Univesitas. This e-mail provides information about how to access your online Orientation for your course, {{ $program->getTranslation('title', 'en') }}.
Your online course will begins on, {{ $date }} 10, 2022. You will be receiving three emails from Barça innovation hub Univesitas as follows:
* The 1st email will be on {{ $date }} 7, 2022 , about the course details.
* The 2nd email will be on {{ $date }} 8, 2022, with your access information and a welcome guide manual.
* The 3rd email will be on {{ $date }} 10, 2022, a reminder on the same day of your starting online course date.

If you have trouble accessing your course or you have any questions about your course, please contact our e-learning team at info@izonlineedu.com.
For more information please refer to https://izonlineedu.com.
Thank you for choosing IZ Online Education.

Take care,<br>
IZ Online Education Team
@else
<div dir="rtl">
    تأكيد التسجيل في IZ Online Education

    عزيزي {{ $user->first_name }}،

    مرحبًا بك في IZ Online Education

    أفضل منصة تعليمية عبر الإنترنت في مصر يتم تدريسها من قبل أفضل المدربين المحترفين وذوي الخبرة بشهادة رسمية من Barcelona Innovation Hub.

    يسعدنا انضمامك إلينا في هذا البرنامج من IZ Online Education مع مركز Barça للابتكار- Univesitas. يوفر هذا البريد الإلكتروني معلومات حول كيفية الوصول إلى التوجيه الخاص بك عبر الإنترنت لدورتك التدريبية . ستبدأ دورتك التدريبية عبر الإنترنت في 10 {{ __($date,[],'ar') }} 2022. ستتلقى رسالتين بريد إلكتروني من مركز برشلونة للابتكار Univesitas على النحو التالي:

    سيكون البريد الإلكتروني الأول في 07 {{ __($date,[],'ar') }} 2022 ، حول تفاصيل الدورة.

    سيكون البريد الإلكتروني الثاني في 10 {{ __($date,[],'ar') }} 2022 ، تذكيرًا في نفس اليوم من تاريخ بدء الدورة التدريبية عبر الإنترنت.
    إذا كنت تواجه مشكلة في الوصول إلى الدورة التدريبية الخاصة بك أو كان لديك أي أسئلة حول دورتك ، فيرجى الاتصال بفريق التعلم الإلكتروني على info@izonlineedu.com. لمزيد من المعلومات ، يرجى الرجوع إلى https://izonlineedu.com. شكرًا لاختيارك IZ Online Education.

    يعتني،
    فريق IZ Online Education
</div>
@endif
@endcomponent