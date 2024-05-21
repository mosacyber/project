import weka.core.Attribute;
import weka.core.Instance;
import weka.core.Instances;
import weka.classifiers.Classifier;
import weka.classifiers.trees.M5P;
import weka.core.SerializationHelper;

public class GraduateProject1 {

    public static void main(String[] args) throws Exception {
        // استقبال القيم من سطر الأوامر
        int schoolPercentage = Integer.parseInt(args[0]);
        int aptitudeTest = Integer.parseInt(args[1]);
        int academicAchievement = Integer.parseInt(args[2]);
        int programming1 = Integer.parseInt(args[3]);
        int programming2 = Integer.parseInt(args[4]);
        int dataStructure = Integer.parseInt(args[5]);
        int visualProgramming = Integer.parseInt(args[6]);
        int schoolType = Integer.parseInt(args[7]);

        // إنشاء مثيل جديد من Weka Instances
        Instances data = createInstances(schoolPercentage, aptitudeTest, academicAchievement, programming1, programming2, dataStructure, visualProgramming, schoolType);

        // تحميل نموذج Weka المُدرب
       // Classifier classifier;
        try {
            Classifier cls = (Classifier) SerializationHelper.read("D:\\Subject_Prediction(year3)\\Subject_Prediction(Year3).model");
        } catch (Exception e) {
            System.err.println("Error loading model: " + e.getMessage());
            return; // خروج من البرنامج إذا فشل تحميل النموذج
        }

        // التنبؤ بالقيمة باستخدام النموذج
        double prediction = cls.classifyInstance(data.instance(0));

        // إظهار القيمة المُتنبأة
        System.out.println("Predicted class: " + prediction);
    }

    private static Instances createInstances(int schoolPercentage, int aptitudeTest, int academicAchievement, int programming1, int programming2, int dataStructure, int visualProgramming, int schoolType) {
        // إنشاء قائمة من السمات
        Attribute[] attributes = new Attribute[9];
        attributes[0] = new Attribute("schoolPercentage", Attribute.INT);
        attributes[1] = new Attribute("aptitudeTest", Attribute.INT);
        attributes[2] = new Attribute("academicAchievement", Attribute.INT);
        attributes[3] = new Attribute("programming1", Attribute.INT);
        attributes[4] = new Attribute("programming2", Attribute.INT);
        attributes[5] = new Attribute("dataStructure", Attribute.INT);
        attributes[6] = new Attribute("visualProgramming", Attribute.INT);
        attributes[7] = new Attribute("schoolType", Attribute.INT);
        attributes[8] = new Attribute("class", Attribute.INT);

        // إنشاء مثيل جديد من Weka Instances
        Instances data = new Instances("GraduateProject", attributes, 1);

        // إنشاء مثيل جديد من Weka Instance
        Instance instance = new Instance(9);
        instance.setValue(0, schoolPercentage);
        instance.setValue(1, aptitudeTest);
        instance.setValue(2, academicAchievement);
        instance.setValue(3, programming1);
        instance.setValue(4, programming2);
        instance.setValue(5, dataStructure);
        instance.setValue(6, visualProgramming);
        instance.setValue(7, schoolType);

        // إضافة المثيل إلى مجموعة البيانات
        data.add(instance);

        return data;
    }
}
