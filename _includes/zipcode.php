<?php
function getZipCodes() {
	return  array( 68197, 68001, 68301, 68428, 69210, 68119, 68524, 68967, 68620, 68810, 68303,
								 68855, 68710, 69301, 68920, 68879, 68304, 68711, 68621, 68812, 68940, 69331, 
								 68813, 68814, 69340, 68922, 68815, 68816, 68002, 68858, 69120, 69121, 68939, 
								 69333, 68003, 68817, 68955, 68713, 68923, 68305, 68818, 68307, 68924, 68925, 
								 68004, 68172, 68355, 68309, 68622, 69020, 68714, 68715, 69334, 68310, 68926, 
								 68313, 68314, 68716, 68717, 68623, 68444, 68005, 68123, 68133, 68147, 68157, 
								 68624, 68315, 68316, 69021, 68317, 68007, 68104, 69301, 68927, 68814, 68505, 
								 69122, 69151, 69335, 68979, 68928, 68008, 68009, 68718, 68929, 68180, 68930, 
								 68333, 68318, 68820, 68620, 68978, 68010, 68010, 68319, 69123, 68626, 69140, 
								 68882, 68821, 69336, 68871, 68719, 69125, 68320, 68822, 69166, 69162, 68321, 
								 69127, 68322, 68014, 68720, 69155, 68932, 68323, 68380, 68324, 68354, 68823, 
								 69128, 68172, 68722, 68325, 69190, 69160, 68978, 68824, 68825, 69022, 68883, 
								 68932, 68123, 68326, 68723, 68866, 68015, 68016, 68627, 68655, 68724, 68404, 
								 68826, 68017, 69337, 68725, 69023, 68827, 69129, 68526, 68869, 68327, 68429, 
								 68628, 68629, 68328, 68852, 68933, 68726, 69120, 69343, 69211, 68727, 68018, 
								 69162, 68601, 68602, 68828, 68881, 68728, 68329, 68330, 68874, 68642, 68331, 
								 68959, 68835, 68930, 69130, 68332, 68019, 69339, 68729, 68178, 68631, 68333, 
								 68730, 69212, 69024, 69025, 68873, 68825, 68731, 69131, 69026, 68831, 68835, 
								 69130, 68335, 68336, 68632, 68815, 68337, 68338, 68341, 68020, 68825, 68956, 
								 68339, 68950, 68340, 68934, 69132, 68342, 69133, 68732, 69021, 68633, 68832, 
								 68343, 68344, 68828, 68345, 68345, 68346, 68382, 68634, 69348, 68821, 68833, 
								 68635, 68347, 68860, 68945, 68834, 68935, 68936, 68835, 68636, 69201, 68825, 
								 68348, 68022, 68310, 69340, 68852, 68836, 68349, 69134, 69135, 68937, 68837, 
								 68528, 68733, 68734, 69027, 68350, 68859, 68637, 68859, 69028, 68735, 68351, 
								 68352, 68938, 68354, 68355, 68929, 69029, 68838, 68357, 68358, 69165, 68112, 
								 68152, 68044, 68736, 68023, 69339, 68765, 68939, 68025, 68026, 68359, 68638, 
								 68940, 69163, 68870, 68360, 68632, 68361, 68640, 68828, 69341, 68840, 68362, 
								 68841, 68352, 69339, 68310, 68305, 68941, 68364, 68901, 69343, 69138, 68450, 
								 68365, 68801, 68802, 68803, 69140, 68763, 68842, 68366, 68367, 68028, 68405, 
								 68942, 69141, 68701, 68738, 69357, 69030, 68801, 68368, 69142, 68444, 69040, 
								 68843, 68941, 68901, 68377, 68943, 69345, 69346, 68739, 68944, 68901, 68902, 
								 68901, 68901, 68529, 69347, 69367, 69032, 68955, 68844, 68945, 68315, 68370, 
								 69348, 68371, 68946, 69358, 68029, 69143, 68372, 68331, 68947, 68310, 68948, 
								 68949, 68969, 68949, 68372, 68967, 68310, 68950, 68030, 68310, 68031, 68875, 
								 68846, 68740, 68305, 68641, 68741, 68375, 68376, 68642, 68971, 69350, 69033, 
								 68952, 68859, 69034, 68923, 68923, 68901, 68954, 68742, 68033, 69133, 68743, 
								 68377, 68378, 68379, 68937, 68937, 69214, 68379, 68955, 68845, 68847, 68848, 
								 68849, 68924, 68956, 68034, 69144, 68856, 69216, 69145, 69154, 68333, 68854, 
								 68123, 68128, 68138, 68958, 68982, 69351, 69023, 68415, 68745, 68128, 68957, 
								 69036, 68980, 68643, 69146, 68064, 69147, 68380, 68850, 68381, 68501, 68502, 
								 68503, 68504, 68505, 68506, 68507, 68508, 68509, 68510, 68512, 68514, 68516, 
								 68517, 68520, 68521, 68522, 68523, 68524, 68526, 68527, 68528, 68529, 68531, 
								 68532, 68542, 68583, 68588, 68644, 68036, 69148, 68852, 68941, 69149, 69217, 
								 68958, 69162, 68346, 68382, 68037, 68853, 68840, 68371, 69352, 68746, 68933, 
								 68038, 68939, 68039, 68748, 69150, 68749, 68402, 68040, 68403, 68854, 68933, 
								 69354, 68404, 68883, 68710, 68770, 68967, 68751, 68855, 69037, 69151, 68824, 
								 69038, 69001, 68401, 68401, 69353, 68747, 69001, 69353, 68747, 68041, 68752, 
								 69355, 68042, 68856, 69218, 68862, 68816, 68813, 68405, 68144, 68145, 68858, 
								 68406, 68753, 68858, 69356, 68959, 68924, 69357, 68647, 69039, 69358, 68648, 
								 68957, 68971, 69152, 68407, 68409, 68175, 68814, 68755, 68960, 68410, 68410, 
								 68413, 68756, 68961, 68414, 69219, 68813, 68840, 68757, 68758, 68759, 68044, 
								 68760, 68862, 68961, 68701, 68702, 68959, 68305, 68649, 68932, 68859, 69101, 
								 69103, 69336, 68831, 68763, 68964, 68853, 68929, 68761, 68045, 68757, 68860, 
								 68632, 68415, 68861, 68113, 68113, 68113, 69153, 68416, 68046, 68101, 68102, 
								 68103, 68104, 68105, 68106, 68107, 68108, 68109, 68110, 68111, 68112, 68113, 
								 68114, 68116, 68117, 68118, 68119, 68120, 68122, 68124, 68127, 68130, 68131, 
								 68132, 68133, 68134, 68135, 68136, 68137, 68138, 68139, 68142, 68144, 68145, 
								 68147, 68152, 68154, 68155, 68157, 68164, 68172, 68175, 68176, 68178, 68179, 
								 68180, 68182, 68183, 68197, 68198, 68183, 68982, 68763, 68452, 68764, 68862, 
								 68966, 68651, 69154, 69190, 68765, 68417, 68834, 68863, 68967, 68766, 69040, 
								 68864, 68418, 68419, 68046, 68133, 68157, 69041, 68410, 68941, 68420, 69155, 
								 68047, 69154, 68421, 68652, 68865, 68422, 68767, 68768, 68769, 68653, 68048, 
								 68423, 68343, 68866, 68424, 68654, 68770, 68869, 69156, 68352, 68050, 68949, 
								 68870, 68920, 68527, 68977, 68355, 68655, 68404, 68883, 69157, 68949, 68969, 
								 68127, 68128, 68771, 68869, 68428, 68970, 69336, 68971, 68971, 68967, 68429, 
								 68059, 68601, 69167, 68658, 68870, 68310, 68826, 68972, 68430, 68923, 68310, 
								 68871, 68659, 68305, 68523, 68055, 69153, 68714, 68973, 68930, 68773, 68431, 
								 68866, 69360, 68974, 68825, 68056, 68660, 68774, 68872, 68443, 68869, 68873, 
								 68957, 68433, 68430, 69030, 68977, 69155, 68874, 68975, 68866, 68969, 68817, 
								 68979, 68661, 68875, 69361, 69363, 68057, 68935, 69161, 68434, 68876, 68662, 
								 68876, 68949, 68982, 68853, 68436, 68763, 68437, 68466, 69160, 69162, 68663, 
								 68973, 68976, 68664, 68869, 68058, 68824, 68959, 68832, 68776, 68774, 68724, 
								 68665, 69220, 68777, 68901, 68438, 68881, 68967, 68934, 68862, 68059, 68778, 
								 68977, 68779, 68439, 69163, 68509, 68440, 69358, 68441, 68442, 68324, 68443, 
								 68818, 69042, 68444, 69043, 68666, 68780, 68878, 69149, 68978, 68667, 69333, 
								 69165, 68979, 68445, 68869, 68446, 68447, 68448, 68434, 68642, 68879, 68450, 
								 68061, 69341, 68460, 69166, 68352, 68870, 69155, 68062, 68781, 68453, 69044, 
								 68825, 68980, 69167, 68063, 68667, 68669, 68198, 68454, 68455, 68179, 68588, 
								 68849, 68182, 68583, 68198, 68198, 68504, 68981, 68456, 69201, 68064, 68065, 
								 69168, 68760, 68783, 68457, 68813, 68827, 68815, 68458, 68407, 68460, 68066, 
								 68784, 69169, 68067, 68461, 68956, 68068, 68785, 68069, 69045, 68786, 68462, 
								 68787, 68853, 68463, 68814, 69132, 69170, 68176, 68901, 68788, 68874, 68464, 
								 68881, 68927, 68070, 68927, 69365, 69366, 69367, 68465, 68982, 68927, 69171, 
								 68763, 69046, 68071, 68789, 68790, 68072, 68791, 68882, 69221, 68883, 68872, 
								 68309, 68466, 68792, 68410, 68815, 68467, 68073, 68925 );
 }
?>